<?php

namespace ExtService\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="externalPunct")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class ExternalPunct
{
    /**
     * @ODM\Id
     * @var int
     */
    protected $_id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $id;
    /**
     * @var array
     * @ODM\Field(type="hash")
     */

    protected $city;

    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $net;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $stId;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $name;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $adress;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $phone;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $consigneeName;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $consignee;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $activity;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $isLocal;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $localTypeId;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $id1s;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $directDelivery;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $unloadingTime;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $isConsolidating;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $code1c;
    /**
     * @var string
     * @ODM\Field(type="string")
     */

    protected $coordinates;

    /**
     * @ODM\Date
     */
    protected $deletedAt;

    /**
     * @param string $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param string $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param array $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return array
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $code1c
     */
    public function setCode1c($code1c)
    {
        $this->code1c = $code1c;
    }

    /**
     * @return string
     */
    public function getCode1c()
    {
        return $this->code1c;
    }

    /**
     * @param string $consignee
     */
    public function setConsignee($consignee)
    {
        $this->consignee = $consignee;
    }

    /**
     * @return string
     */
    public function getConsignee()
    {
        return $this->consignee;
    }

    /**
     * @param string $consigneeName
     */
    public function setConsigneeName($consigneeName)
    {
        $this->consigneeName = $consigneeName;
    }

    /**
     * @return string
     */
    public function getConsigneeName()
    {
        return $this->consigneeName;
    }

    /**
     * @param string $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * @return string
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param mixed $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param string $directDelivery
     */
    public function setDirectDelivery($directDelivery)
    {
        $this->directDelivery = $directDelivery;
    }

    /**
     * @return string
     */
    public function getDirectDelivery()
    {
        return $this->directDelivery;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id1s
     */
    public function setId1s($id1s)
    {
        $this->id1s = $id1s;
    }

    /**
     * @return string
     */
    public function getId1s()
    {
        return $this->id1s;
    }

    /**
     * @param string $isConsolidating
     */
    public function setIsConsolidating($isConsolidating)
    {
        $this->isConsolidating = $isConsolidating;
    }

    /**
     * @return string
     */
    public function getIsConsolidating()
    {
        return $this->isConsolidating;
    }

    /**
     * @param string $isLocal
     */
    public function setIsLocal($isLocal)
    {
        $this->isLocal = $isLocal;
    }

    /**
     * @return string
     */
    public function getIsLocal()
    {
        return $this->isLocal;
    }

    /**
     * @param string $localTypeId
     */
    public function setLocalTypeId($localTypeId)
    {
        $this->localTypeId = $localTypeId;
    }

    /**
     * @return string
     */
    public function getLocalTypeId()
    {
        return $this->localTypeId;
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
     * @param array $net
     */
    public function setNet($net)
    {
        $this->net = $net;
    }

    /**
     * @return array
     */
    public function getNet()
    {
        return $this->net;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $stId
     */
    public function setStId($stId)
    {
        $this->stId = $stId;
    }

    /**
     * @return string
     */
    public function getStId()
    {
        return $this->stId;
    }

    /**
     * @param string $unloadingTime
     */
    public function setUnloadingTime($unloadingTime)
    {
        $this->unloadingTime = $unloadingTime;
    }

    /**
     * @return string
     */
    public function getUnloadingTime()
    {
        return $this->unloadingTime;
    }

    public function getData()
    {
        $data = array();
        foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
            $data[$key] = $this->$key;
        }
        return $data;
    }

    public function setData($data)
    {
        if ($data !== null && is_array($data)) {
            foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
                if (isset($data[$key])) {
                    $this->$key = $data[$key];
                }
            }
        }
        return $this;

    }

}