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
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

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

    public function createOrUpdate($entityLink, $data, $uuid = null) {

        if(empty($uuid)) {
            $entityName="\\".$entityLink;
            $item = new $entityName();
        } elseif($this->uuidGenerator->isValid($uuid)) {
            $item = $this->documentManager->getRepository($entityLink)->findOneBy(
                array('uuid' => $uuid));
        } else {
            return null;
        }

        $item->setData($data);
        $this->documentManager->persist($item);
        $this->documentManager->flush();
        return $item;
    }

    public function fetch($entityLink, $findParams) {
        $item = $this->createQuery($this->documentManager->createQueryBuilder($entityLink), $findParams)->getQuery()->getSingleResult();
        if(empty($item)) {
            return null;
        } else {
            return $item;
        }
    }

    public function fetchAll($entityLink, $findParams) {
        $items = $this->createQuery($this->documentManager->createQueryBuilder($entityLink), $findParams)->getQuery()->execute()->toArray();
        if(empty($items)) {
            return array();
        } else {
            return $items;
        }
    }

    public function getUserByToken($authToken) {
        $auth = $this->documentManager->getRepository('AuthToken\Entity\AuthToken')->findOneBy(array('token' => $authToken));
        if(!empty($auth)) {
            return $auth->getUser();
        } else {
            return null;
        }
    }

}