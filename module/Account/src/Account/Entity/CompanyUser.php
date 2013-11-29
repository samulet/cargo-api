<?php

namespace Account\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="companyUser")
 */
class CompanyUser
{
    public function __construct($accId, $user_id, $param, $roles)
    {
        if ($param == 'admin') {
            $this->orgId = new \MongoId($accId);
        } else {
            $this->setCompanyId(new \MongoId($accId));
        }
        $this->setUserId(new \MongoId($user_id));
        $this->roles = $roles;
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
     * @ODM\ObjectId
     * @var int
     */
    protected $userId;
    /**
     * @ODM\ObjectId
     * @var int
     */
    protected $companyId;

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

    public function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * Set id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function getCompanyId()
    {
        return $this->companyId;
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
    public function setUUID($uuid = null)
    {
        if(empty($uuid)) {
            $uuidGen = new UuidGenerator();
            $this->uuid=$uuidGen->generateV4();
        } else {
            $this->uuid = $uuid;
        }
        return $this;
    }
    public function getUUID()
    {
        return $this->uuid;
    }
}