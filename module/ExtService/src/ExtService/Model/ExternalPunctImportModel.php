<?php

namespace ExtService\Model;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use ExtService\Entity\ExternalPunct;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use ExtService\Service\ImportService;

class ExternalPunctImportModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;
    protected $onlineProvider;
    protected $externalPunctModel;
    protected $importService;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel, $onlineProvider, $externalPunctModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
        $this->onlineProvider=$onlineProvider;
        $this->externalPunctModel = $externalPunctModel;
        $this->importService = new ImportService();
    }

    public function onlineChangeFindUpdate($places, $onlineCode)
    {
        $resultArray=array(
            'new'  => 0,
            'changed'  => 0,
            'exists'  => 0,
        );
        $hydrator = new DoctrineHydrator($this->documentManager, 'ExtService\Entity\ExternalPunct');
        ini_set('max_execution_time', 1000);
        foreach($places as $res) {
            $resVars = get_object_vars($res);
            $resVars['source'] = $onlineCode;

            if(!empty($resVars['city'])) {
                $cityTmp = $resVars['city'];
                unset($resVars['city']);
            }

            if(!empty($resVars['net'])) {
                $netTmp = $resVars['net'];
                unset($resVars['net']);
            }

            $resVars = array_map('strval', $resVars);
            $resVars = $this->queryBuilderModel->camelCaseKeys($resVars);

            if(!empty($cityTmp)) {
                $cityTmp = array_map('strval', get_object_vars($cityTmp));
                $resVars['city'] = $this->queryBuilderModel->camelCaseKeys($cityTmp);
            }

            if(!empty($netTmp)) {
                $netTmp = array_map('strval', get_object_vars($netTmp));
                $resVars['net'] = $this->queryBuilderModel->camelCaseKeys($netTmp);
            }

            $object = $this->externalPunctModel->fetch($resVars);
            if(!empty($object)) {
                $resultArray['exists']++;
            } else {
                $item = $this->externalPunctModel->fetch(array('id' => $resVars['id'], 'source' => $resVars['source']));
                if(empty($item)) {
                    $resultArray['new']++;
                    $item = new ExternalPunct();
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
                        'ext_service_punct_code' => $onlineName,
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
        $result = $this->importService->fetch($url.'/api/reference/places/', $code);
        if(!is_string($result)) {
            if(!empty($result->delivery_points)) {
                $resultArray=array(
                    'processed' => sizeof($result->delivery_points),
                );
                $resultArray=$resultArray+$this->onlineChangeFindUpdate($result->delivery_points, $onlineCode);
                return $resultArray;
            } else {
                return 'Список пунктов доставки пуст';
            }
        } else {
            return $result;
        }
    }

    /**
     * @param mixed $externalPunctModel
     */
    public function setExternalPunctModel($externalPunctModel)
    {
        $this->externalPunctModel = $externalPunctModel;
    }

    /**
     * @return mixed
     */
    public function getExternalPunctModel()
    {
        return $this->externalPunctModel;
    }

}