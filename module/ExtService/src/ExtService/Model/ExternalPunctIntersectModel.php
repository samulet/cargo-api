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
        $conditions = array('source' => $data['source'], 'type' => $data['type'], 'id' => $data['id']);
        /** @var \ExtService\Entity\ExternalPunct $object */
        $object = $this->externalPunctModel->fetch($conditions);
        if (empty($object)) {
            return false;
        }
        if (empty($data['place'])) {
            $place = array('name' => $object->getName());
            $placeEntity = $this->getPlaceModel()->create($place);
            $data['place'] = $placeEntity->getUuid();
        }
        $object->setLink($data['place']);
        $this->documentManager->persist($object);
        $this->documentManager->flush();

        return $object;
    }

    public function deleteLink($source, $type, $id)
    {
        /** @var \ExtService\Entity\ExternalPunct $object */
        $object = $this->externalPunctModel->fetch(array('source' => $source, 'type' => $type, 'id' => $id));
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
