<?php
namespace Account\Model;

use Account\Entity\Account;
use Application\Service\AuthorizationServiceAwareInterface;
use Application\Service\AuthorizationServiceAwareTrait;
use Doctrine\ODM\MongoDB\DocumentManager;
use QueryBuilder\Model\QueryBuilderModel;
use User\Identity\IdentityProvider;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

class AccountModel implements AuthorizationServiceAwareInterface, EventManagerAwareInterface
{
    use EventManagerAwareTrait;
    use AuthorizationServiceAwareTrait;

    /**
     * @var \Doctrine\ODM\MongoDB\DocumentManager
     */
    protected $documentManager;
    /**
     * @var QueryBuilderModel
     */
    protected $queryBuilderModel;
    /**
     * @var \User\Identity\IdentityProvider
     */
    protected $provider;

    public function __construct(DocumentManager $documentManager, $queryBuilderModel, IdentityProvider $provider)
    {
        $this->documentManager = $documentManager;
        $this->queryBuilderModel = $queryBuilderModel;
        $this->provider = $provider;
    }

    /**
     * Создать или обновить аккаунт. Возвращает сущность созданного или модифицированого аккаунта
     *
     * @param array $data записываемый массив данных
     * @param string $uuid uuid модифицируемого аккаунта
     *
     * @return \Account\Entity\Account|null
     */
    public function createOrUpdate($data, $uuid = null)
    {
        return $this->queryBuilderModel->createOrUpdate('Account\Entity\Account', $data, $uuid);
    }

    /**
     * Возвращает сущность аккаунта по массиву поисковых параметров, однозначность результата дает указание uuid в массиве findParams
     *
     * @param array $findParams ассоциативный массив
     *
     * @return \Account\Entity\Account|null
     */
    public function fetch($findParams)
    {
        return $this->queryBuilderModel->fetch('Account\Entity\Account', $findParams);
    }

    /**
     * Возвращает массив сущностей аккаунтов по поисковым параметрам
     *
     * @param array $findParams ассоциативный массив
     *
     * @return array(\Account\Entity\Account)|null
     */
    public function fetchAll($findParams)
    {
        return $this->queryBuilderModel->fetchAll('Account\Entity\Account', $findParams);
    }

    /**
     * Удалить аккаунт. При успехе возвращает uuid удаленого аккаунта
     *
     * @param string $uuid uuid аккаунта
     *
     * @return string|null
     */
    public function delete($uuid)
    {
        $this->queryBuilderModel->delete('Account\Entity\Account', array('uuid' => $uuid));
    }
}
