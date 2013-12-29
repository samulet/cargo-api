<?php
namespace Place\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="place")
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class PlaceEntity
{
    /**
     * @ODM\Id
     * @var int
     */
    protected $id;
    /**
     * @ODM\ObjectId
     * @ODM\Field(name="owner")
     * @var int
     */
    protected $ownerId;
    /**
     * @var array
     * @ODM\Field(type="string")
     */
    protected $city;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $adress;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $phone;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $consigneeName;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $consignee;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $localTypeId;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $unloadingTime;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $coordinates;
    /**
     * @Gedmo\Timestampable(on="create")
     * @ODM\Date
     */
    protected $created;
    /**
     * @ODM\Date
     */
    protected $deleted;
}
