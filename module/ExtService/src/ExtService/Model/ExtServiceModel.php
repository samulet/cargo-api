<?php

namespace ExtService\Model;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Zend\Http\Client;
use Zend\Http\ClientStatic;
use ExtService\Entity\ExtServiceCompany;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class ExtServiceModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;
    protected $configOnline;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel,$configOnline)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
        $this->configOnline=$configOnline;
    }

    protected function onlineGetToken($ch, $url)
    {
        curl_setopt($ch, CURLOPT_URL, $url);
        $authTokenJson = curl_exec($ch);
        $authToken = json_decode($authTokenJson);
        if(!empty($authToken)) {
            if(!empty($authToken->token)) {
                return $authToken->token;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    protected function setCurl()
    {
        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        return $ch;
    }

    public function onlineChangeFindUpdate($companies, $onlineCode)
    {
        $resultArray=array(
            'new'  => 0,
            'changed'  => 0,
            'exists'  => 0,
        );
        $hydrator = new DoctrineHydrator($this->documentManager, 'ExtService\Entity\ExtServiceCompany');
        ini_set('max_execution_time', 300);
        foreach($companies as $res) {

            $resVars = get_object_vars($res);
            $resVars['source'] = $onlineCode;
            $resVars = array_map('strval', $resVars);

            $object = $this->fetch($resVars);
            if(!empty($object)) {
                $resultArray['exists']++;
            } else {
                $object = $this->fetch(array('id' => $resVars['id'], 'source' => $resVars['source']));
                if(empty($object)) {
                    $resultArray['new']++;
                    $item = new ExtServiceCompany();
                    $item->setData($resVars);
                    $this->documentManager->persist($item);
                    $this->documentManager->flush();
                } else {
                    $resultArray['changed']++;
                    $object->setData($resVars);
                    $this->documentManager->persist($object);
                    $this->documentManager->flush();
                }
            }

        }
        return $resultArray;
    }

    public function getInformationFromAllOnline()
    {
        $resultArray=array();
        foreach($this->configOnline as $onlineName=>$data) {
            foreach($data as $url => $key) {
                $res = $this->getInformationFromOnline($url,$key,$onlineName);
                if(!is_string($res)) {
                    $res=array(
                        'stat' => $res,
                        'ext_service_company_code' => $onlineName,
                        'status' => 'success'
                    );
                } else {
                    $res=array(
                        'reason' => $res,
                        'status' => 'fail',
                        'ext_service_company_code' => $onlineName
                    );
                }
                array_push($resultArray, $res);
            }
        }
        return $resultArray;
    }
    public function getInformationFromOnlineByOnlineName($onlineName)
    {
        if(!empty($this->configOnline[$onlineName])) {
            $data = $this->configOnline[$onlineName];
            foreach($data as $url => $key) {
                $res = $this->getInformationFromOnline($url,$key,$onlineName);
                if(!is_string($res)) {
                    $res=array(
                        'stat' => $res,
                        'ext_service_company_code' => $onlineName,
                        'status' => 'success'
                    );
                } else {
                    $res=array(
                        'reason' => $res,
                        'status' => 'fail',
                        'ext_service_company_code' => $onlineName
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
        $ch=$this->setCurl();
        $fullUrl=$url.'/api/reference/companies/';
        $token = $this->onlineGetToken($ch, $fullUrl);
        if(!empty($token)) {
            $ch = $this->setCurl();
            curl_setopt($ch, CURLOPT_URL, $fullUrl.'?key='.sha1($token.$code));
            $res = curl_exec($ch);
            $result = json_decode($res);
            if(!empty($result)) {
                if(!empty($result->authentication)) {
                    if($result->authentication=='error') {
                        return 'Ошибка авторизации';
                    }
                } else {
                    if(!empty($result->companies)) {
                        $resultArray=array(
                            'processed' => sizeof($result->companies),
                        );
                        $resultArray=$resultArray+$this->onlineChangeFindUpdate($result->companies, $onlineCode);
                        return $resultArray;
                    } else {
                        return 'Список компаний пуст';
                    }
                }
            } else {
                return 'Невозможно выполнить запрос';
            }
        } else {
            return 'Невозможно получить токен';
        }
    }



    /**
     * @param $data
     * @param null $uuid
     * @return mixed
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate('ExtService\Entity\ExtServiceCompany',$data,$uuid);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch('ExtService\Entity\ExtServiceCompany',$findParams);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function fetchAll($findParams)
    {
        return $this->queryBuilderModel->fetchAll('ExtService\Entity\ExtServiceCompany',$findParams);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function delete($findParams)
    {
        return $this->queryBuilderModel->delete('ExtService\Entity\ExtServiceCompany',$findParams);
    }

    public function addCompanyIntersect($data)
    {
        $data = array_map('strval', $data);
        $object = $this->fetch(array('id' => $data['id'], 'source' => $data['source']));
        if(!empty($object)) {
            $object->setLink($data['company']);
            $this->documentManager->persist($object);
            $this->documentManager->flush();
        } else {
            return false;
        }
    }

    public function deleteCompanyIntersect($data)
    {
        $data = array_map('strval', $data);
        $object = $this->fetch(array('id' => $data[1], 'source' => $data[0]));
        if(!empty($object)) {
            $object->setLink(null);
            $this->documentManager->persist($object);
            $this->documentManager->flush();
        } else {
            return false;
        }
    }
}