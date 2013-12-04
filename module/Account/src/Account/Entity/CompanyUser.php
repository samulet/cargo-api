<?php

namespace Account\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="companyUser")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class CompanyUser
{
    public function __construct()
    {

    }

    /**
     * @ODM\Id
     * @var int
     */
    protected $id;
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
     * @ODM\ObjectId
     * @var int
     */
    protected $orgId;
    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $roles;
    /**
     * @Gedmo\Timestampable(on="create")
     * @ODM\Date
     * @Annotation\Exclude()
     */
    protected $created_at;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ODM\Date
     * @Annotation\Exclude()
     */
    protected $updated_at;
    /**
     * @ODM\Date
     */
    protected $deletedAt;

    public function setData($data) {
        if($data !== null && is_array($data)){
            foreach(array_keys(get_class_vars(__CLASS__)) as $key){
                if(isset($data[$key]) && ($key!='id') && ($key!='uuid') ){
                    $this->$key = $data[$key];
                }
            }
        }
        return $this;

    }

    public function getData() {
        $data = array();
        foreach(array_keys(get_class_vars(__CLASS__)) as $key){
            $data[$key]=$this->$key;
        }
        return $data;
    }
    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

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

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
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