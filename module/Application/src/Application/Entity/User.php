<?php
namespace Application\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class User
{
    /**
     * Идентификатор пользователя
     *
     * @var \User\Entity\User
     * @ODM\ObjectId
     * @ODM\Field(name="id")
     * @ODM\ReferenceOne(targetDocument="User\Entity\User", simple=true)
     */
    protected $id;
    /**
     * Имя пользователя
     *
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;
    /**
     * UUID пользователя
     *
     * @var string
     * @ODM\Field(type="string")
     * @ODM\Index
     */
    protected $uuid;

    /**
     * Конструктор класса
     *
     * @param \User\Entity\User|null $user
     */
    public function __construct(\User\Entity\User $user = null)
    {
        if (!empty($user)) {
            $this->id = $user;
            $this->name = $user->getDisplayName();
            $this->uuid = $user->getUuid();
        }
    }

    /**
     * @param \User\Entity\User $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \User\Entity\User
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}
