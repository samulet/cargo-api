<?php
namespace ExtService\Entity;

use Application\Entity\BaseEntity;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="externalPlace")
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class ExternalPunct extends BaseEntity
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
    protected $link;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $source;
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
    protected $type;
    /**
     * @var array
     * @ODM\Field(type="hash")
     */
    protected $legal;
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
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

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
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param string $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return array
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param array $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCode1c()
    {
        return $this->code1c;
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
    public function getConsignee()
    {
        return $this->consignee;
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
    public function getConsigneeName()
    {
        return $this->consigneeName;
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
    public function getCoordinates()
    {
        return $this->coordinates;
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
    public function getDirectDelivery()
    {
        return $this->directDelivery;
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
    public function getId()
    {
        return $this->id;
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
    public function getId1s()
    {
        return $this->id1s;
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
    public function getIsConsolidating()
    {
        return $this->isConsolidating;
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
    public function getIsLocal()
    {
        return $this->isLocal;
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
    public function getLocalTypeId()
    {
        return $this->localTypeId;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getNet()
    {
        return $this->net;
    }

    /**
     * @param array $net
     */
    public function setNet($net)
    {
        $this->net = $net;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
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
    public function getStId()
    {
        return $this->stId;
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
    public function getUnloadingTime()
    {
        return $this->unloadingTime;
    }

    /**
     * @param string $unloadingTime
     */
    public function setUnloadingTime($unloadingTime)
    {
        $this->unloadingTime = $unloadingTime;
    }

    public function getData()
    {
        $data = array();
        foreach (array_keys(get_class_vars(__CLASS__)) as $key) {
            $data[$key] = $this->$key;
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getLegal()
    {
        return $this->legal;
    }

    /**
     * @param array $legal
     */
    public function setLegal($legal)
    {
        $this->legal = $legal;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function setData(array $data)
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

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
}
