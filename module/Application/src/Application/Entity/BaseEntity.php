<?php
namespace Application\Entity;

use Doctrine\ODM\MongoDB\Id\UuidGenerator;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\MappedSuperclass
 */
class BaseEntity
{
    /**
     * @ODM\Id
     * @var int
     */
    protected $id;
    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ODM\Date
     */
    protected $created;
    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ODM\Date
     */
    protected $updated;
    /**
     * @var \DateTime
     * @ODM\Date
     */
    protected $deleted;
    /**
     * @var int
     * @ODM\Field(type="increment", name="v")
     */
    protected $version = 0;
    /**
     * Пользователь, создавший запись
     *
     * @var User
     * @ODM\EmbedOne(targetDocument="\Application\Entity\User")
     */
    protected $creator;
    /**
     * Пользователь, акцептовавший запись
     *
     * @var User
     * @ODM\EmbedOne(targetDocument="\Application\Entity\User")
     */
    protected $acceptor;

    /**
     * Устанавливает свойства документа из переданного массива
     *
     * @param array $data
     *
     * @return $this
     */
    public function setData(array $data)
    {
        foreach (array_keys(get_object_vars($this)) as $key) {
            if ('id' == $key) {
                continue;
            }
            if (isset($data[$key])) {
                $this->$key = $data[$key];
            }
        }

        return $this;
    }

    /**
     * Возвращает массив с данными документа
     *
     * @return array
     */
    public function getData()
    {
        $data = array();
        foreach (array_keys(get_object_vars($this)) as $key) {
            $data[$key] = $this->$key;
        }
        return $data;
    }

    /**
     * Возвращает идентификатор документа
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Устанавливает идентификатор документа
     *
     * @param int $id
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Возвращает дату удаления документа
     *
     * @return \DateTime
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Устанавливает дату удаления документа
     *
     * @param \DateTime $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Возвращает дату создания документа
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Устанавливает дату создания документа
     *
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Возвращает дату обновления документа
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Устанавливает дату обновления документа
     *
     * @param \DateTime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Возвращает версию документа
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Устанавливает версию документа
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Увеличивает версию документа
     *
     * @return void
     */
    public function incrementVersion()
    {
        ++$this->version;
    }

    /**
     * @param \User\Entity\User $user
     */
    public function setCreator(\User\Entity\User $user)
    {
        $this->creator = new User($user);
    }

    /**
     * @return \Application\Entity\User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param \User\Entity\User $user
     */
    public function setAcceptor(\User\Entity\User $user)
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
     * @return UuidGenerator
     */
    protected function getGenerator()
    {
        return new UuidGenerator;
    }
}
