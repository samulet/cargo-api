<?php
namespace Reference\Model;

use Doctrine\ODM\MongoDB\DocumentManager;
use QueryBuilder\Model\QueryBuilderModel;

abstract class AbstractReferenceModel
{
    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var QueryBuilderModel
     */
    protected $queryBuilderModel;
    protected $entityLink;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel)
    {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
    }

    /**
     * Создать или обновить аккаунт. Возвращает сущность созданного или модифицированого аккаунта
     *
     * @param array  $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Reference\Entity\Reference|null
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate($this->entityLink, $data, $uuid);
    }

    /**
     * Возвращает сущность аккаунта по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Reference\Entity\Reference|null
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch($this->entityLink, $findParams);
    }

    /**
     * Возвращает массив сущностей аккаунтов по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\Reference\Entity\Reference)|null
     */
    public function fetchAll($findParams)
    {
        return $this->queryBuilderModel->fetchAll($this->entityLink, $findParams);
    }

    /**
     * Удалить аккаунт. При успехе возвращает uuid удаленого аккаунта
     *
     * @param string $uuid uuid аккаунта
     *
     * @return string|null
     */
    public function delete($uuid)
    {
        $qb3 = $this->documentManager->getRepository($this->entityLink)->findBy(
            array('uuid' => new \MongoId($uuid))
        );
        $this->documentManager->remove($qb3);
        $this->documentManager->flush();

        return $uuid;
    }
}
