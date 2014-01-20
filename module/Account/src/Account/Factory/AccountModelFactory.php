<?php
namespace Account\Factory;

use Account\Model\AccountModel;
use Zend\EventManager\EventManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AccountModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Doctrine\ODM\MongoDB\DocumentManager $documentManager */
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        /** @var \QueryBuilder\Model\QueryBuilderModel $queryBuilderModel */
        $queryBuilderModel = $serviceLocator->get('QueryBuilderModel');
        /** @var \User\Identity\IdentityProvider $provider */
        $provider = $serviceLocator->get('User\Identity\IdentityProvider');
        /** @var EventManager $eventManager */
        $eventManager = $serviceLocator->get('EventManager');

        $accountModel = new AccountModel($documentManager, $queryBuilderModel, $provider);
        $accountModel->setEventManager($eventManager);
        $accountModel->setHydrator($documentManager->getHydratorFactory());

        return $accountModel;
    }
}
