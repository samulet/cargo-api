<?php

namespace Reference\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="product_group")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class ProductGroup
{
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
     * @ODM\Field(type="string")
     */
    protected $code;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $title;
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
     * @ODM\Date
     */
    protected $deletedAt;

    public function setData($data) {
        if($data !== null && is_array($data)){
            foreach(array_keys(get_class_vars(__CLASS__)) as $key){
                if(isset($data[$key]) && ($key!='id') && ($key!='uuid') ){
                    if(!is_array($this->$key)) {
                        $this->$key = $data[$key];
                    } else {
                        $this->$key=$this->$key+$data[$key];
                    }

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
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
        return $this;
    }
    public function getUuid()
    {
        return $this->uuid;
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

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    public function getCode()
    {
        return $this->code;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    public function getTitle()
    {
        return $this->title;
    }
}