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

    public function getInformationFromOnline($code) {

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