<?php

namespace ExtService\Model;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use ExtService\Entity\ExternalPunct;
use ExtService\Provider\OnlineProvider;
use ExtService\Service\ImportService;

class ExternalPunctImportModel
{
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var \QueryBuilder\Model\QueryBuilderModel
     */
    protected $queryBuilderModel;
    /**
     * @var OnlineProvider
     */
    protected $onlineProvider;
    /**
     * @var ExternalPunctModel
     */
    protected $externalPunctModel;
    /**
     * @var ImportService
     */
    protected $importService;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel, $onlineProvider, $externalPunctModel)
    {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
        $this->onlineProvider = $onlineProvider;
        $this->externalPunctModel = $externalPunctModel;
        $this->importService = new ImportService();
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
                        'status' => 'success',
                        'code' => $onlineName,
                    );
                } else {
                    $res = array(
                        'reason' => $res,
                        'status' => 'fail',
                        'code' => $onlineName,
                    );
                }
                array_push($resultArray, $res);
            }
        }
        return $resultArray;
    }

    public function getInformationFromOnline($url, $code, $onlineCode)
    {
        $result = $this->importService->fetch($url . '/api/reference/places/', $code);
        if (!is_string($result)) {
            if (!empty($result->delivery_points)) {
                $resultArray = array(
                    'processed' => sizeof($result->delivery_points),
                );
                $resultArray = $resultArray + $this->onlineChangeFindUpdate($result->delivery_points, $onlineCode);
                return $resultArray;
            } else {
                return 'Список пунктов доставки пуст';
            }
        } else {
            return $result;
        }
    }

    public function onlineChangeFindUpdate($places, $onlineCode)
    {
        $resultArray = array('new' => 0, 'changed' => 0, 'exists' => 0);
        $hydrator = new DoctrineHydrator($this->documentManager, 'ExtService\Entity\ExternalPunct');

        foreach ($places as $res) {
            $resVars = get_object_vars($res);
            $resVars['source'] = $onlineCode;

            if (!empty($resVars['city'])) {
                $cityTmp = $resVars['city'];
                unset($resVars['city']);
            }

            if (!empty($resVars['net'])) {
                $netTmp = $resVars['net'];
                unset($resVars['net']);
            }

            if (!empty($resVars['legal'])) {
                $legalTmp = $resVars['legal'];
                unset($resVars['legal']);
            }

            if (empty($resVars['type'])) {
                $resVars['type'] = 'dp';
            }

            $resVars = array_map('strval', (array)$resVars);
            $resVars = $this->queryBuilderModel->camelCaseKeys($resVars);

            if (!empty($cityTmp)) {
                $cityTmp = array_map('strval', get_object_vars($cityTmp));
                $resVars['city'] = $this->queryBuilderModel->camelCaseKeys($cityTmp);
            }

            if (!empty($netTmp)) {
                $netTmp = array_map('strval', get_object_vars($netTmp));
                $resVars['net'] = $this->queryBuilderModel->camelCaseKeys($netTmp);
            }

            if (!empty($legalTmp)) {
                $legalTmp = array_map('strval', get_object_vars($legalTmp));
                $resVars['legal'] = $this->queryBuilderModel->camelCaseKeys($legalTmp);
            } else {
                $resVars['legal'] = array();
            }

            $conditions = ['source' => $resVars['source'], 'type' => $resVars['type'], 'id' => $resVars['id']];
            $object = $this->externalPunctModel->fetch($conditions);
            if (!empty($object)) {
                $distinction = $this->calculateDistriction($object, $resVars);
                if (empty($distinction)) {
                    $resultArray['exists']++;
                    continue;
                } else {
                    $resultArray['changed']++;
                }
            } else {
                $resultArray['new']++;
                $object = new ExternalPunct();
            }
            $this->documentManager->persist($hydrator->hydrate($resVars, $object));
        }
        $this->documentManager->flush();
        return $resultArray;
    }

    /**
     * @param ExternalPunct $object
     * @param array $resVars
     *
     * @return array
     */
    protected function calculateDistriction(ExternalPunct $object, $resVars)
    {
        $filteredKeys = array('_id' => null, 'link' => null, 'deleted' => null, 'version' => null,
            'created' => null, 'updated' => null);

        return
            $this->recursiveDiff(
                array_diff_key($object->getData(), $filteredKeys),
                $resVars
            );
    }

    protected function recursiveDiff($array1, $array2)
    {
        $result = array();

        foreach ($array1 as $k => $v) {
            if (array_key_exists($k, $array2)) {
                if (is_array($v)) {
                    $diff = $this->recursiveDiff($v, $array2[$k]);
                    if (count($diff)) {
                        $result[$k] = $diff;
                    }
                } else {
                    if ($v != $array2[$k]) {
                        $result[$k] = $v;
                    }
                }
            } else {
                $result[$k] = $v;
            }
        }
        return $result;
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

    /**
     * @return mixed
     */
    public function getExternalPunctModel()
    {
        return $this->externalPunctModel;
    }

    /**
     * @param mixed $externalPunctModel
     */
    public function setExternalPunctModel($externalPunctModel)
    {
        $this->externalPunctModel = $externalPunctModel;
    }
}
