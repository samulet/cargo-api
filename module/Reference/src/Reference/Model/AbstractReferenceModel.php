<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 5/3/13
 * Time: 7:55 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Reference\Model;

use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

abstract class AbstractReferenceModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;
    protected $entityLink;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel)
    {
        $this->uuidGenerator = new UuidGenerator();
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
    }


    /**
     * Создать или обновить аккаунт. Возвращает сущность созданного или модифицированого аккаунта
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Reference\Entity\Reference|null
     */
    protected function createOrUpdateAbstract($data, $uuid = null)
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
    protected function fetchAbstract($findParams)
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
    protected function fetchAll($findParams, $entityName)
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
    protected function deleteAbstract($uuid)
    {
        $qb3 = $this->documentManager->getRepository($this->entityLink)->findBy(
            array('uuid' => new \MongoId($uuid))
        );
        $this->documentManager->remove($qb3);
        $this->documentManager->flush();
        return $uuid;
    }


}