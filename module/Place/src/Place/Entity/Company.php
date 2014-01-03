<?php
namespace Place\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class Company
{
    /**
     * Идентификатор компании
     *
     * @ODM\ObjectId
     * @ODM\Field(name="id")
     * @var int
     */
    protected $id;
    /**
     * Название компании
     *
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;
    /**
     * UUID компании
     *
     * @var string
     * @ODM\Field(type="string")
     * @ODM\Index
     */
    protected $uuid;
}
