<?php

namespace ExtService\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use QueryBuilder\Model\QueryBuilderModel;

class ExternalCompanyIntersectModel
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
     * @var ExternalCompanyModel
     */
    protected $externalCompanyModel;

    public function __construct(
        DocumentManager $documentManager,
        QueryBuilderModel $queryBuilder,
        ExternalCompanyModel $externalCompanyModel
    ) {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilder;
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
        return $object;
    }

    public function deleteCompanyIntersect($source, $id)
    {
        /** @var \ExtService\Entity\ExternalCompany $object */
        $object = $this->externalCompanyModel->fetch(array('source' => $source, 'id' => $id));
        if (!empty($object) && !empty($object->getLink())) {
            $object->setLink(null);
            $this->documentManager->persist($object);
            $this->documentManager->flush();
            return true;
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
