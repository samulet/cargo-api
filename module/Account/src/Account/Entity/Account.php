<?php

namespace Account\Entity;

use Application\Entity\BaseEntity;
use Application\Entity\User;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;

/**
 *
 * @ODM\Document(collection="account", repositoryClass="Account\Repository\AccountRepository")
 * @ODM\HasLifecycleCallbacks
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class Account extends BaseEntity
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $uuid;
    /**
     * @var bool
     * @ODM\Field(type="boolean")
     */
    protected $activated = true;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $title;
    /**
     * @var array
     * @ODM\Collection(strategy="addToSet")
     */
    protected $staff = array();

    /**
     * Get activated.
     *
     * @return string activated
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set activated.
     *
     * @param bool $activated
     *
     * @return Account
     */
    public function setActivated($activated)
    {
        $this->activated = (bool) $activated;
        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Account
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid = null)
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @param array $staff
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;
    }

    /**
     * @return array
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param string $uuid
     */
    public function addStaff($uuid)
    {
        if (!in_array($uuid, $this->staff)) {
            $this->staff[] = $uuid;
        }
    }

    /**
     * Активирует аккаунт
     */
    public function activate()
    {
        $this->setActivated(true);
    }

    /**
     * Дизактивирует аккаунт
     */
    public function disactivate()
    {
        $this->setActivated(false);
    }

    /**
     * @ODM\PrePersist
     */
    public function onPrePersist()
    {
        if (empty($this->uuid)) {
            $this->uuid = $this->getGenerator()->generateV4();
        }
    }
}
