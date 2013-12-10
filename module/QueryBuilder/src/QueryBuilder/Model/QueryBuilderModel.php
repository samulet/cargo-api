<?php
/**
 * Created by JetBrains PhpStorm.
 * User: solov
 * Date: 5/3/13
 * Time: 7:55 PM
 * To change this template use File | Settings | File Templates.
 */

namespace QueryBuilder\Model;

use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\EventManager;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class QueryBuilderModel
{
    protected $documentManager;
    protected $uuidGenerator;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager=$documentManager;
        $this->uuidGenerator = new UuidGenerator();
    }

    public function createQuery($qb, $searchArray)
    {

        foreach ($searchArray as $key => $value) {
            $qb->field($key)->equals($value);
        }
        return $qb;
    }

    public function createSetQuery($qb, $searchArray)
    {
        foreach ($searchArray as $key => $value) {
            $qb->field($key)->set($value);
        }
        return $qb;
    }

    public function isTicket($itemId)
    {
        $itemId = $this->documentManager->getRepository('Ticket\Entity\Ticket')->findOneBy(
            array('id' => new \MongoId($itemId))
        );
        if (!empty($itemId)) {
            return true;
        } else {
            return false;
        }
    }

    public function isResource($itemId)
    {
        $itemId = $this->documentManager->getRepository('Resource\Entity\Resource')->findOneBy(
            array('id' => new \MongoId($itemId))
        );
        if (!empty($itemId)) {
            return true;
        } else {
            return false;
        }
    }

    public function arrayIntersect($arr1, $arr2)
    {
        foreach ($arr1 as &$el) {
            $el = serialize($el);
        }
        foreach ($arr2 as &$el) {
            $el = serialize($el);
        }
        $resultArray = array_intersect($arr1, $arr2);
        foreach ($resultArray as &$el) {
            $el = unserialize($el);
        }
        return $resultArray;
    }

    public function getObjectData($items) {
        $resultArray=array();
        foreach($items as $item) {
            array_push($resultArray,$item->getData());
        }
        return $resultArray;
    }

    /**
     * Создать или обновить айтем. Возвращает сущность созданного или модифицированого айтема
     *
     * @param string $entityLink путь к айтему
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return ?|null
     */
    public function createOrUpdate($entityLink, $data, $uuid = null) {
        $entityName="\\".$entityLink;
        if(empty($uuid)) {
            $item = new $entityName();
            if(empty($data['uuid'])) {
                $data['uuid'] = $this->uuidGenerator->generateV4();
            }
        } elseif($this->uuidGenerator->isValid($uuid)) {
            $item = $this->documentManager->getRepository($entityLink)->findOneBy(
                array('uuid' => $uuid));
        } else {
            return null;
        }
        $hydrator = new DoctrineHydrator($this->documentManager, $entityName);
        $item = $hydrator->hydrate($data, $item);
        $this->documentManager->persist($item);
        $this->documentManager->flush();
        return $item;
    }
    /**
     * Возвращает сущность, определяемую по $entityLink, однозначность результата дает указание uuid в массиве findParams
     *
     * @param string $entityLink линк на стандартизованную сущность
     * @param array $findParams ассоциативный массив
     *
     * @return ?|null
     */
    public function fetch($entityLink, $findParams) {
        $item = $this->createQuery($this->documentManager->createQueryBuilder($entityLink), $findParams)->getQuery()->getSingleResult();
        if(empty($item)) {
            return null;
        } else {
            return $item;
        }
    }
    /**
     * Возвращает сущность, определяемую по $entityLink
     *
     * @param string $entityLink линк на стандартизованную сущность
     * @param array $findParams ассоциативный массив
     *
     * @return array(?)|null
     */
    public function fetchAll($entityLink, $findParams) {
        $items = $this->createQuery($this->documentManager->createQueryBuilder($entityLink), $findParams)->getQuery()->execute()->toArray();
        if(empty($items)) {
            return array();
        } else {
            return $items;
        }
    }

}