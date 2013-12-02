<?php

namespace AddList\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Zend\Form\Annotation;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Element\Collection;
use Reference\Entity\AbstractReference;
/**
 *
 * @ODM\Document(collection="addListCargo", repositoryClass="AddList\Repository\AddListRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class AddList extends AbstractReference
{
    public function __construct()
    {

    }
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $testStr;
}