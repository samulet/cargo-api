<?php

namespace Account\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Zend\Form\Annotation;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Element\Collection;

/**
 *
 * @ODM\Document(collection="account", repositoryClass="Account\Repository\AccountRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 * @Annotation\Name("account")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class Account
{
    public function __construct()
    {
        $this->lastItemNumber=0;
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
    protected $ownerId;
    /**
     * @Gedmo\Timestampable(on="create")
     * @ODM\Date
     */
    protected $created_at;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ODM\Date
     */
    protected $updated_at;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $activated;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $title;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $lastItemNumber;
    /**
     * @ODM\Date
     */
    protected $deletedAt;
    public function setData($data) {

            if($data !== null && is_array($data)){
                foreach(array_keys(get_class_vars(__CLASS__)) as $key) {
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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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
     * @return AccountInterface
     */

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type.
     *
     * @param string $type
     * @return AccountInterface
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    public function getUUID()
    {
        return $this->uuid;
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

    public function getLastItemNumber()
    {
        return $this->lastItemNumber;
    }

    public function setLastItemNumber($lastItemNumber)
    {
        $this->lastItemNumber = $lastItemNumber;
        return $this;
    }


}

