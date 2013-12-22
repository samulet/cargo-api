<?php

namespace ExtService\Model;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use ExtService\Entity\ExternalCompany;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use ExtService\Service\ImportService;

class ExternalCompanyImportModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;
    protected $onlineProvider;
    protected $externalCompanyModel;
    protected $importService;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel,$onlineProvider,$externalCompanyModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
        $this->onlineProvider=$onlineProvider;
        $this->externalCompanyModel = $externalCompanyModel;
        $this->importService = new ImportService();
    }

    public function onlineChangeFindUpdate($companies, $onlineCode)
    {
        $resultArray=array(
            'new'  => 0,
            'changed'  => 0,
            'exists'  => 0,
        );
        $hydrator = new DoctrineHydrator($this->documentManager, 'ExtService\Entity\ExternalCompany');
        ini_set('max_execution_time', 300);
        foreach($companies as $res) {
            $resVars = get_object_vars($res);
            $resVars['source'] = $onlineCode;
            $resVars = array_map('strval', $resVars);
            $resVars = $this->queryBuilderModel->camelCaseKeys($resVars);
            $object = $this->externalCompanyModel->fetch($resVars);
            if(!empty($object)) {
                $resultArray['exists']++;
            } else {
                $item = $this->externalCompanyModel->fetch(array('id' => $resVars['id'], 'source' => $resVars['source']));
                if(empty($item)) {
                    $resultArray['new']++;
                    $item = new ExternalCompany();
                } else {
                    $resultArray['changed']++;
                }
                $item = $hydrator->hydrate($resVars, $item);
                $this->documentManager->persist($item);
                $this->documentManager->flush();
            }

        }
        return $resultArray;
    }

    public function getInformationFromAllOnline()
    {
        $resultArray=array();
        foreach($this->onlineProvider->getConfig() as $onlineName=>$data) {
            foreach($data as $url => $key) {
                $res = $this->getInformationFromOnline($url,$key,$onlineName);
                if(!is_string($res)) {
                    $res=array(
                        'stat' => $res,
                        'external_code' => $onlineName,
                        'status' => 'success'
                    );
                } else {
                    $res=array(
                        'reason' => $res,
                        'status' => 'fail',
                        'external_code' => $onlineName
                    );
                }
                array_push($resultArray, $res);
            }
        }
        return $resultArray;
    }
    public function getInformationFromOnlineByOnlineName($onlineName)
    {
        if(!empty($this->onlineProvider->getConfig()[$onlineName])) {
            $data = $this->onlineProvider->getConfig()[$onlineName];
            foreach($data as $url => $key) {
                $res = $this->getInformationFromOnline($url,$key,$onlineName);
                if(!is_string($res)) {
                    $res=array(
                        'stat' => $res,
                        'external_code' => $onlineName,
                        'status' => 'success'
                    );
                } else {
                    $res=array(
                        'reason' => $res,
                        'status' => 'fail',
                        'external_code' => $onlineName
                    );
                }
                return $res;
            }
        } else {
            return null;
        }

    }

    public function getInformationFromOnline($url, $code, $onlineCode)
    {
        $result = $this->importService->fetch($url.'/api/reference/companies/', $code);
        if(!is_string($result)) {
            if(!empty($result->companies)) {
                $resultArray=array(
                    'processed' => sizeof($result->companies),
                );
                $resultArray=$resultArray+$this->onlineChangeFindUpdate($result->companies, $onlineCode);
                return $resultArray;
            } else {
                return 'Список компаний пуст';
            }
        } else {
            return $result;
        }
    }

    /**
     * @param mixed $externalCompanyModel
     */
    public function setExternalCompanyModel($externalCompanyModel)
    {
        $this->externalCompanyModel = $externalCompanyModel;
    }

    /**
     * @return mixed
     */
    public function getExternalCompanyModel()
    {
        return $this->externalCompanyModel;
    }

}