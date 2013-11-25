<?php

namespace Account\Entity;

use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;
use Zend\Form\Annotation;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Element\Collection;

/**
 * @ODM\Document(collection="company", repositoryClass="Account\Repository\CompanyRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 * @Annotation\Name("company")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 */
class Company
{
    public function __construct()
    {
        $uuidGen = new UuidGenerator();
        $this->uuid=$uuidGen->generateV4();
    }

    /**
     * @ODM\Id
     * @var int
     * @Annotation\Exclude()
     */
    protected $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     * @Annotation\Exclude()
     */
    protected $uuid;

    /**
     * @ODM\ObjectId
     * @var int
     * @Annotation\Exclude()
     */
    protected $ownerAccId;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ODM\Date
     * @Annotation\Exclude()
     */
    protected $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ODM\Date
     * @Annotation\Exclude()
     */
    protected $updated;

    /**
     * @var string
     * @ODM\Field(type="string")
     * @Annotation\Exclude()
     */
    protected $activated;

    /**
     * @var string
     * @ODM\Field(type="string")
     * @Annotation\Exclude()
     */
    protected $dirty;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $short;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $property;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $inn;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $ogrn;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $kpp;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $tax = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $addresses = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $contacts = array();

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $forming_method;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $capital;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $founder_count;

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $founders = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $authorized_persons = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")=
     */
    protected $okved = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $pfr = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $fms = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $licenses = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $applicants = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $accounts = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $persons = array();

    /**
     * @var array
     * @ODM\Collection(strategy="pushAll")
     */
    protected $sites = array();
    /**
     * @ODM\Date
     */
    protected $deletedAt;
    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\Attributes({"value":"Отправить"})
     */

    public function setData($data) {
        if($data !== null && is_array($data)){
            foreach(array_keys(get_class_vars(__CLASS__)) as $key){
                if(isset($entity[$key]) && ($key!='id') && ($key!='uuid') ){
                    $this->$key = $entity[$key];
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
     * @return UserInterface
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Description.
     *
     * @param string $description
     * @return UserInterface
     */
    public function setDescription($description)
    {
        $this->description = $description;
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

    public function getUUID()
    {
        return $this->uuid;
    }

    public function setUUID($uuid)
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getRequisites()
    {
        return $this->requisites;
    }

    public function setRequisites($requisites)
    {
        $this->requisites = $requisites;
        return $this;
    }

    public function getAddressFact()
    {
        return $this->addressFact;
    }

    public function setAddressFact($addressFact)
    {
        $this->addressFact = $addressFact;
        return $this;
    }

    public function getAddressReg()
    {
        return $this->addressReg;
    }

    public function setAddressReg($addressReg)
    {
        $this->addressReg = $addressReg;
        return $this;
    }

    public function getGeneralManager()
    {
        return $this->generalManager;
    }

    public function setGeneralManager($generalManager)
    {
        $this->generalManager = $generalManager;
        return $this;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
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

    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name
     * @return AccountInterface
     */

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}