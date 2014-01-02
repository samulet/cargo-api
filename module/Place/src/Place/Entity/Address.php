<?php
namespace Place\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class Address
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $country;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $city;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $street;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $house;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $building;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $floor;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $number;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $kaldr;
}
