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

class QueryBuilderModel
{
    protected $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager=$documentManager;
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

}