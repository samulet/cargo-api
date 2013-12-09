<?php

namespace Cargo\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Zend\Form\Annotation;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Element\Collection;

/**
 *
 * @ODM\Document(collection="cargo")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class Cargo
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
    protected $ownerAccId;
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
        return $this->created_at;
    }

    public function setCreated($created)
    {
        $this->created_at = $created;
    }

    public function setUpdated($updated)
    {
        $this->updated_at = $updated;
    }

    public function getUpdated()
    {
        return $this->updated_at;
    }

    public function getOwnerAccId()
    {
        return $this->ownerAccId;
    }

    public function setOwnerAccId($ownerAccId)
    {
        $this->ownerAccId = $ownerAccId;
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
}

