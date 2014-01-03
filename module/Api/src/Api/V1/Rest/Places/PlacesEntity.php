<?php
namespace Api\V1\Rest\Places;

use Place\Entity\PlaceEntity as Place;

class PlacesEntity
{
    /**
     * UUID
     *
     * @var string
     */
    protected $uuid;
    /**
     * Название (наименование пункта)
     *
     * @var string
     */
    protected $name;
    /**
     * Владелец (юр лицо)
     *
     * @var array
     */
    protected $company;
    /**
     * Назначения пункта - может быть несколько (офис, отгрузки, доставки, хранения др.)
     *
     * @var array
     */
    protected $purpose = array();
    /**
     * Адрес
     *
     * @var array
     */
    protected $address = array();
    /**
     * Контакты
     *
     * @var array
     */
    protected $contacts = array();
    /**
     * Время работы пункта
     *
     * @var string
     */
    protected $operationTime;
    /**
     * Координаты
     *
     * @var string
     */
    protected $coordinates;
    /**
     * Физ лица (сотрудники юр лица), находящиеся непосредственно на данном пункте
     *
     * @var array
     */
    protected $staff = array();
    /**
     * Признак активности (если активен, то появляется в выпадающих списках)
     *
     * @var boolean
     */
    protected $active;
    /**
     * Признак использования электронного документоборота
     *
     * @var boolean
     */
    protected $electronicWorkflow;
    /**
     * Дополнительная информация
     *
     * @var string
     */
    protected $note;
    /**
     * Рейтинг пункта
     *
     * @var int
     */
    protected $rating;
    /**
     * Дата создания записи
     *
     * @var int
     */
    protected $created;
    /**
     * Дата удаления записи
     *
     * @var int
     */
    protected $deleted;
    /**
     * Пользователь, создавший запись
     *
     * @var string
     */
    protected $creator;
    /**
     * Пользователь, акцептовавший запись
     *
     * @var string
     */
    protected $acceptor;

    public function __construct(Place $entity)
    {
        $this->uuid = $entity->getUuid();
        $this->name = $entity->getName();
        $this->company = get_object_vars($entity->getCompany());
        $this->purpose = $entity->getPurpose();
        $this->address = get_object_vars($entity->getAddress());
        $this->contacts = get_object_vars($entity->getContacts());
        $this->operationTime = $entity->getOperationTime();
        $this->coordinates = $entity->getCoordinates();
        $this->staff = $entity->getStaff();
        $this->active = $entity->getActive();
        $this->electronicWorkflow = $entity->getElectronicWorkflow();
        $this->note = $entity->getNote();
        $this->rating = $entity->getRating();
        $this->created = $entity->getCreated()->getTimestamp();
        $this->deleted = $entity->getDeleted()->getTimestamp();
        $this->creator = $entity->getCreator()->getUuid();
        $this->acceptor = $entity->getAcceptor()->getUuid();
    }
}
