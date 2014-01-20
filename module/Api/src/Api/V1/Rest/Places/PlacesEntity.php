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
        $this->company = $this->extractCompany($entity->getCompany());
        $this->purpose = $entity->getPurpose();
        $this->address = $this->extractAddress($entity->getAddress());
        $this->contacts = $entity->getContacts();
        $this->operationTime = $entity->getOperationTime();
        $this->coordinates = $entity->getCoordinates();
        $this->staff = $entity->getStaff();
        $this->active = $entity->getActive();
        $this->electronicWorkflow = $entity->getElectronicWorkflow();
        $this->note = $entity->getNote();
        $this->rating = $entity->getRating();
        $this->created = !$entity->getCreated() ? : $entity->getCreated()->getTimestamp();
        $this->deleted = !$entity->getDeleted() ? : $entity->getDeleted()->getTimestamp();
        $this->creator = $this->extractUser($entity->getCreator());
        $this->acceptor = $this->extractUser($entity->getAcceptor());
    }

    /**
     * @param \Place\Entity\Address $address
     *
     * @return array|null
     */
    protected function extractAddress(\Place\Entity\Address $address = null)
    {
        if (!$address) {
            return null;
        }

        $config = new \GeneratedHydrator\Configuration('Place\\Entity\\Address');
        $hydratorClass = $config->createFactory()->getHydratorClass();
        $hydrator = new $hydratorClass();

        return $hydrator->extract($address);
    }

    /**
     * @param \Place\Entity\Company $company
     *
     * @return array|null
     */
    protected function extractCompany(\Place\Entity\Company $company = null)
    {
        if (!$company) {
            return null;
        }

        $config = new \GeneratedHydrator\Configuration('Place\\Entity\\Company');
        $hydratorClass = $config->createFactory()->getHydratorClass();
        $hydrator = new $hydratorClass();

        $result = $hydrator->extract($company);
        unset($result['id']);
        return $result;
    }

    /**
     * @param \Application\Entity\User $user
     *
     * @return array|null
     */
    protected function extractUser(\Application\Entity\User $user = null)
    {
        if (!$user) {
            return null;
        }

        $config = new \GeneratedHydrator\Configuration('Application\\Entity\\User');
        $hydratorClass = $config->createFactory()->getHydratorClass();
        $hydrator = new $hydratorClass();

        $result = $hydrator->extract($user);
        unset($result['id']);
        return $result;
    }
}
