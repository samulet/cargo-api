<?php

namespace ExtService\Model;

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Zend\Http\Client;
use Zend\Http\ClientStatic;
use ExtService\Entity\ExternalCompany;

class ExternalCompanyIntersectModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;
    protected $externalCompanyModel;

    public function __construct(DocumentManager $documentManager,$queryBuilderModel,$externalCompanyModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager=$documentManager;
        $this->queryBuilderModel=$queryBuilderModel;
        $this->externalCompanyModel = $externalCompanyModel;
    }

    public function addCompanyIntersect($data)
    {
        $data = array_map('strval', $data);
        /** @var \ExtService\Entity\ExternalCompany $object */
        $object = $this->externalCompanyModel->fetch(array('id' => $data['id'], 'source' => $data['source']));
        if(empty($object)) {
            return false;
        }
        $object->setLink($data['company']);
        $this->documentManager->persist($object);
        $this->documentManager->flush();
        return true;
    }

    public function deleteCompanyIntersect($data)
    {
        $data = array_map('strval', $data);
        $object = $this->externalCompanyModel->fetch(array('id' => $data[1], 'source' => $data[0]));
        if(!empty($object)) {
            $object->setLink(null);
            $this->documentManager->persist($object);
            $this->documentManager->flush();
        } else {
            return false;
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
