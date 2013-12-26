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
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    protected $uuidGenerator;
    /**
     * @var \QueryBuilder\Model\QueryBuilderModel
     */
    protected $queryBuilderModel;
    /**
     * @var ExternalCompanyModel
     */
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
        $object = $this->externalCompanyModel->fetch(array('source' => $data['source'], 'id' => $data['id']));
        if (empty($object)) {
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
     * @param ExternalCompanyModel $externalCompanyModel
     */
    public function setExternalCompanyModel(ExternalCompanyModel $externalCompanyModel)
    {
        $this->externalCompanyModel = $externalCompanyModel;
    }

    /**
     * @return ExternalCompanyModel
     */
    public function getExternalCompanyModel()
    {
        return $this->externalCompanyModel;
    }
}
