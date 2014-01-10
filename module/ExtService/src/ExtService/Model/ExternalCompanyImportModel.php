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
use QueryBuilder\Model\QueryBuilderModel;

class ExternalCompanyImportModel
{
    protected $documentManager;
    protected $uuidGenerator;
    /**
     * @var QueryBuilderModel
     */
    protected $queryBuilderModel;
    protected $onlineProvider;
    /**
     * @var ExternalCompanyModel
     */
    protected $externalCompanyModel;
    protected $importService;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel, $onlineProvider, $externalCompanyModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
        $this->onlineProvider = $onlineProvider;
        $this->externalCompanyModel = $externalCompanyModel;
        $this->importService = new ImportService();
    }

    public function onlineChangeFindUpdate($companies, $onlineCode)
    {
        $resultArray = array('new' => 0, 'changed' => 0, 'exists' => 0);
        $hydrator = new DoctrineHydrator($this->documentManager, 'ExtService\Entity\ExternalCompany');
        $filteredKeys = array('_id' => null, 'link' => null, 'deleted' => null, 'version' => null,
            'created' => null, 'updated' => null);

        foreach ($companies as $res) {
            $resVars = get_object_vars($res);
            $resVars['source'] = $onlineCode;
            $resVars['code'] = sprintf('%s-%s', $onlineCode, $resVars['id']);
            $resVars = array_map('strval', $resVars);
            $resVars = $this->queryBuilderModel->camelCaseKeys($resVars);
            $conditions = array('source' => $resVars['source'], 'id' => $resVars['id']);
            /** @var \ExtService\Entity\ExternalCompany $object */
            $object = $this->externalCompanyModel->fetch($conditions);
            if (!empty($object)) {
                $distinction = array_diff_key(array_diff_assoc($object->getData(), $resVars), $filteredKeys);
                if (empty($distinction)) {
                    $resultArray['exists']++;
                    continue;
                } else {
                    $resultArray['changed']++;
                }
            } else {
                $resultArray['new']++;
                $object = new ExternalCompany();
            }
            $this->documentManager->persist($hydrator->hydrate($resVars, $object));
        }
        $this->documentManager->flush();

        return $resultArray;
    }

    public function getInformationFromAllOnline()
    {
        $resultArray = array();
        foreach ($this->onlineProvider->getConfig() as $onlineName => $data) {
            foreach ($data as $url => $key) {
                $res = $this->getInformationFromOnline($url, $key, $onlineName);
                if (!is_string($res)) {
                    $res = array(
                        'stat' => $res,
                        'code' => $onlineName,
                        'status' => 'success'
                    );
                } else {
                    $res = array(
                        'reason' => $res,
                        'status' => 'fail',
                        'code' => $onlineName
                    );
                }
                array_push($resultArray, $res);
            }
        }
        return $resultArray;
    }

    public function getInformationFromOnlineByOnlineName($onlineName)
    {
        if (!empty($this->onlineProvider->getConfig()[$onlineName])) {
            $data = $this->onlineProvider->getConfig()[$onlineName];
            foreach ($data as $url => $key) {
                $res = $this->getInformationFromOnline($url, $key, $onlineName);
                if (!is_string($res)) {
                    $res = array(
                        'stat' => $res,
                        'external_code' => $onlineName,
                        'status' => 'success'
                    );
                } else {
                    $res = array(
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
        $data = $this->importService->fetch($url . '/api/reference/companies/', $code);
        if (!is_string($data)) {
            if (!empty($data->companies)) {
                $statistic = $this->onlineChangeFindUpdate($data->companies, $onlineCode);
                $statistic['processed'] = count($data->companies);
                return $statistic;
            } else {
                return 'Список компаний пуст';
            }
        } else {
            return $data;
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
