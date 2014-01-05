<?php
namespace Account\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use QueryBuilder\Model\QueryBuilderModel;

class CompanyModel
{
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var \QueryBuilder\Model\QueryBuilderModel
     */
    protected $queryBuilderModel;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel)
    {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
    }

    /**
     * Создать ии обновить компанию. Возвращает сущность созданной или модифицированой комнпании.
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Account\Entity\Company|null
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate('Account\Entity\Company', $data, $uuid);
    }

    /**
     * Возвращает сущность компании по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Account\Entity\Company|null
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch('Account\Entity\Company', $findParams);
    }

    /**
     * Возвращает массив сущностей компаний по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\Account\Entity\Company)|null
     */
    public function fetchAll($findParams)
    {
        return $this->queryBuilderModel->fetchAll('Account\Entity\Company', $findParams);
    }

    /**
     * Удаляет компанию
     *
     * @param string $uuid
     *
     * @return bool
     */
    public function delete($uuid)
    {
        /** @var \Account\Entity\Company $entity */
        $entity = $this->documentManager->getRepository('Account\Entity\Company')->findOneBy(array('uuid' => $uuid));
        if (empty($entity)) {
            return false;
        }

        $this->documentManager->remove($entity);
        $this->documentManager->flush();

        return true;
    }

    /**
     * @param $entityLink
     * @param $objectNew
     * @param $objectOld
     *
     * @return mixed
     */
    public function fillEntity($entityLink, $objectNew, $objectOld)
    {
        return $this->queryBuilderModel->fillEntity($entityLink, $objectNew, $objectOld);
    }
}
