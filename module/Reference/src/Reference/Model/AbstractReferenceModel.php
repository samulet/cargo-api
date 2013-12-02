<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 4/24/13
 * Time: 1:35 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Reference\Model;

use Reference\Entity\Reference;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

abstract class AbstractReferenceModel
{
    protected $documentManager;
    protected $uuidGenerator;
    protected $queryBuilderModel;

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
    protected function createOrUpdate($data, $uuid = null, $entityLink)
    {
        return $this->queryBuilderModel->createOrUpdate($entityLink, $data, $uuid);
    }

    /**
     * Возвращает сущность аккаунта по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Reference\Entity\Reference|null
     */
    protected function fetch($findParams, $entityLink)
    {
        return $this->queryBuilderModel->fetch($entityLink, $findParams);
    }

    /**
     * Возвращает массив сущностей аккаунтов по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\Reference\Entity\Reference)|null
     */
    protected function fetchAll($findParams, $entityLink)
    {
        return $this->queryBuilderModel->fetchAll($entityLink, $findParams);
    }

    /**
     * Удалить аккаунт. При успехе возвращает uuid удаленого аккаунта
     *
     * @param string $uuid uuid аккаунта
     *
     * @return string|null
     */
    protected function delete($uuid,$entityLink)
    {
        $qb3 = $this->documentManager->getRepository($entityLink)->findBy(
            array('uuid' => new \MongoId($uuid))
        );
        $this->documentManager->remove($qb3);
        $this->documentManager->flush();
        return $uuid;
    }

}