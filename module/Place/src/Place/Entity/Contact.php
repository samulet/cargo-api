<?php
namespace Place\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class Contact
{
    const TYPE_PHONE = 'phone';
    const TYPE_EMAIL = 'email';
    const TYPE_LINK = 'link';

    /**
     * Тип контакта
     *
     * @var string
     * @ODM\Field(type="string")
     */
    protected $type;
    /**
     * Значение
     *
     * @var string
     * @ODM\Field(type="string")
     */
    protected $value;
}
