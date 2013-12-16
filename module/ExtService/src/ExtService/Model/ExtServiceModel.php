<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 12/12/13
 * Time: 10:20 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ExtService\Model;


use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Zend\Http\Client;
use Zend\Http\ClientStatic;

class ExtServiceModel {

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

    public function getInformationFromOnline($url, $code) {
        /*$client  = new \Zend\Http\Client();

        $client->setUri('http://prodrezerv.altlog.ru/api/reference/companies/');
        $client->setMethod('GET');
        $client->setEncType('application/json');
        $response = $client->send();
     //   die(var_dump($response));
        die(var_dump(urldecode($response->getContent()))); */

        $ch = curl_init();
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',

        );
        curl_setopt($ch, CURLOPT_URL, 'http://prodrezerv.altlog.ru/api/reference/companies/');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $body = '{}';

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $authToken = curl_exec($ch);
        $authToken = json_decode($authToken);

        curl_setopt($ch, CURLOPT_URL, 'http://prodrezerv.altlog.ru/api/reference/companies/?key='.sha1($authToken->token.$code));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $body = '{}';

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $res = curl_exec($ch);
        die(var_dump(json_decode($res)));
    }

    /**
     * @param $data
     * @param null $uuid
     * @return mixed
     */
    public function createOrUpdate($data, $uuid = null) {
        return $this->queryBuilderModel->createOrUpdate('ExtService\Entity\ExtServiceCompany',$data,$uuid);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function fetch($findParams) {
        return $this->queryBuilderModel->fetch('ExtService\Entity\ExtServiceCompany',$findParams);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function fetchAll($findParams) {
        return $this->queryBuilderModel->fetchAll('ExtService\Entity\ExtServiceCompany',$findParams);
    }

    /**
     * @param $findParams
     * @return mixed
     */
    public function delete($findParams) {
        return $this->queryBuilderModel->delete('ExtService\Entity\ExtServiceCompany',$findParams);
    }

}