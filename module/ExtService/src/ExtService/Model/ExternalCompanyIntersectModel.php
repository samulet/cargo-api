<?php

namespace ExtService\Model;

use Account\Entity\Company;
use Account\Model\CompanyModel;
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
    /**
     * @var \Account\Model\CompanyModel
     */
    protected $internalCompanyModel;

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
        if (empty($data['company'])) {
            $companyData = array(
                'short' => $object->getName(),
                'name' => $object->getFullName(),
                'inn' => $object->getInn(),
                'kpp' => $object->getKpp(),
            );
            /** @var Company $companyEntity */
            $companyEntity = $this->internalCompanyModel->createOrUpdate($companyData, null);
            if (empty($companyEntity)) {
                return false;
            }
            $data['company'] = $companyEntity->getUuid();
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

    /**
     * @param \Account\Model\CompanyModel $internalCompanyModel
     */
    public function setInternalCompanyModel(CompanyModel $internalCompanyModel)
    {
        $this->internalCompanyModel = $internalCompanyModel;
    }

    /**
     * @return \Account\Model\CompanyModel
     */
    public function getInternalCompanyModel()
    {
        return $this->internalCompanyModel;
    }
}
