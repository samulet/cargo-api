<?php
namespace ExtService\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use Place\Model\PlaceModel;
use QueryBuilder\Model\QueryBuilderModel;

class ExternalPunctIntersectModel
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
     * @var ExternalPunctModel
     */
    protected $externalPunctModel;
    /**
     * @var PlaceModel
     */
    protected $placeModel;

    public function __construct(
        DocumentManager $documentManager,
        QueryBuilderModel $queryBuilder,
        ExternalPunctModel $externalPunctModel
    ) {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilder;
        $this->externalPunctModel = $externalPunctModel;
    }

    public function addLink($data)
    {
        $data = array_map('strval', $data);
        /** @var \ExtService\Entity\ExternalPunct $object */
        $object = $this->externalPunctModel->fetch(array('source' => $data['source'], 'id' => $data['id']));
        if (empty($object)) {
            return false;
        }
        $object->setLink($data['place']);
        $this->documentManager->persist($object);
        $this->documentManager->flush();
        return $object;
    }

    public function deleteLink($source, $id)
    {
        /** @var \ExtService\Entity\ExternalPunct $object */
        $object = $this->externalPunctModel->fetch(array('source' => $source, 'id' => $id));
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
     * @param ExternalPunctModel $externalPunctModel
     */
    public function setExternalPunctModel(ExternalPunctModel $externalPunctModel)
    {
        $this->externalPunctModel = $externalPunctModel;
    }

    /**
     * @return ExternalPunctModel
     */
    public function getExternalPunctModel()
    {
        return $this->externalPunctModel;
    }

    /**
     * @param \Place\Model\PlaceModel $model
     */
    public function setPlaceModel(PlaceModel $model)
    {
        $this->placeModel = $model;
    }

    /**
     * @return \Place\Model\PlaceModel
     */
    public function getPlaceModel()
    {
        return $this->placeModel;
    }
}
