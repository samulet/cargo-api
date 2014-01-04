<?php
namespace Place\Entity;

use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="place", repositoryClass="Place\Repository\Place")
 * @Gedmo\SoftDeleteable(fieldName="deleted")
 */
class PlaceEntity
{
    const TYPE_OFFICE = 'of';
    const TYPE_WHAREHOUSE = 'wh';
    const TYPE_STORAGE = 'st';
    const TYPE_LOAD = 'ld';
    const TYPE_UNLOAD = 'ul';

    /**
     * @ODM\Id
     * @var int
     */
    protected $id;
    /**
     * UUID
     *
     * @var string
     * @ODM\Field(type="string")
     */
    protected $uuid;
    /**
     * Название (наименование пункта)
     *
     * @var string
     * @ODM\Field(type="string")
     */
    protected $name;
    /**
     * Владелец (юр лицо)
     *
     * @var \Place\Entity\Company
     * @ODM\EmbedOne(targetDocument="Place\Entity\Company")
     */
    protected $company;
    /**
     * Назначения пункта - может быть несколько (офис, отгрузки, доставки, хранения др.)
     *
     * @var array
     * @ODM\Collection(strategy="setArray")
     */
    protected $purpose = array();
    /**
     * Адрес
     *
     * @var \Place\Entity\Address
     * @ODM\EmbedOne(targetDocument="Place\Entity\Address")
     */
    protected $address;
    /**
     * Контакты
     *
     * @var \Place\Entity\Contact
     * @ODM\EmbedOne(targetDocument="Place\Entity\Contact")
     */
    protected $contacts;
    /**
     * Время работы пункта
     *
     * @var string
     * @ODM\Field(type="string", name="optime")
     */
    protected $operationTime;
    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected $coordinates;
    /**
     * Физ лица (сотрудники юр лица), находящиеся непосредственно на данном пункте
     *
     * @var array
     * @ODM\ReferenceMany(targetDocument="User\Entity\User")
     */
    protected $staff = array();
    /**
     * Признак активности (если активен, то появляется в выпадающих списках)
     *
     * @var boolean
     * @ODM\Field(type="boolean")
     */
    protected $active;
    /**
     * Признак использования электронного документоборота
     *
     * @var boolean
     * @ODM\Field(type="boolean")
     */
    protected $electronicWorkflow;
    /**
     * Дополнительная информация
     *
     * @var string
     * @ODM\Field(type="string")
     */
    protected $note;
    /**
     * Рейтинг пункта
     *
     * @var int
     * @ODM\Field(type="int")
     */
    protected $rating;
    /**
     * Дата создания записи
     *
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ODM\Date
     */
    protected $created;
    /**
     * Дата удаления записи
     *
     * @var \DateTime
     * @ODM\Date
     */
    protected $deleted;
    /**
     * Пользователь, создавший запись
     *
     * @var User
     * @ODM\EmbedOne(targetDocument="Place\Entity\User")
     */
    protected $creator;
    /**
     * Пользователь, акцептовавший запись
     *
     * @var User
     * @ODM\EmbedOne(targetDocument="Place\Entity\User")
     */
    protected $acceptor;

    /**
     * @param User $user
     */
    public function setAcceptor($user)
    {
        $this->acceptor = new User($user);
    }

    /**
     * @return User
     */
    public function getAcceptor()
    {
        return $this->acceptor;
    }

    /**
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param \Place\Entity\Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \Place\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \Account\Entity\Company|null $company
     */
    public function setCompany(\Account\Entity\Company $company = null)
    {
        $this->company = new Company($company);
    }

    /**
     * @return \Place\Entity\Company|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \Place\Entity\Contact $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return \Place\Entity\Contact
     */
    public function getContacts()
    {
        return $this->contacts;
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
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \User\Entity\User $user
     */
    public function setCreator(\User\Entity\User $user)
    {
        $this->creator = new User($user);
    }

    /**
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param \DateTime $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return \DateTime
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param boolean $electronicWorkflow
     */
    public function setElectronicWorkflow($electronicWorkflow)
    {
        $this->electronicWorkflow = $electronicWorkflow;
    }

    /**
     * @return boolean
     */
    public function getElectronicWorkflow()
    {
        return $this->electronicWorkflow;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $operationTime
     */
    public function setOperationTime($operationTime)
    {
        $this->operationTime = $operationTime;
    }

    /**
     * @return string
     */
    public function getOperationTime()
    {
        return $this->operationTime;
    }

    /**
     * @param array $purpose
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return array
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @param int $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
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
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
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

    /**
     * @return UuidGenerator
     */
    protected function getGenerator()
    {
        return new UuidGenerator;
    }
}
