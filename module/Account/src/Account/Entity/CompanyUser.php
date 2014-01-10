<?php
namespace Account\Entity;

use Application\Entity\BaseEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="companyUser")
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class CompanyUser extends BaseEntity
{
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $uuid;
    /**
     * @var string
     * @var int
     */
    protected $accUuid;
    /**
     * @var string
     * @var int
     */
    protected $userUuid;
    /**
     * @var string
     * @var int
     */
    protected $companyUuid;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $userRights;
    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $roles;

    /**
     * Set activated.
     *
     * @param string $activated
     * @return UserInterface
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
        return $this;
    }

    public function getAccUuid()
    {
        return $this->accUuid;
    }

    function setAccId($accUuid)
    {
        $this->accUuid = $accUuid;
        return $this;
    }

    public function getUserUuid()
    {
        return $this->userUuid;
    }

    function setUserId($userUuid)
    {
        $this->userUuid = $userUuid;
        return $this;
    }
    public function setCompanyUuid($companyUuid)
    {
        $this->companyUuid = $companyUuid;
        return $this;
    }
    public function getCompanyUuid()
    {
        return $this->companyUuid;
    }

    public function getUserRights()
    {
        return $this->userRights;
    }

    function setUserRights($userRights)
    {
        $this->userRights = $userRights;
        return $this;
    }
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
        return $this;
    }
    public function getUuid()
    {
        return $this->uuid;
    }
}
