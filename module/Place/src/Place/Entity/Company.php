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
     * @var \Account\Entity\Company
     * @ODM\ObjectId
     * @ODM\Field(name="id")
     * @ODM\ReferenceOne(targetDocument="Account\Entity\Company", simple=true)
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

    public function __construct(\Account\Entity\Company $company = null)
    {
        if (!empty($company)) {
            $this->id = $company;
            $this->name = $company->getShort();
            $this->uuid = $company->getUuid();
        }
    }
}
