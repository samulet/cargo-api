<?php
namespace User\Factory;

use User\Model\UserModel;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \User\Identity\IdentityProvider $provider */
        $provider = $serviceLocator->get('User\Identity\IdentityProvider');
        /** @var \Doctrine\ODM\MongoDB\DocumentManager $documentManager */
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        /** @var \QueryBuilder\Model\QueryBuilderModel $queryBuilderModel */
        $queryBuilderModel = $serviceLocator->get('QueryBuilderModel');

        return new UserModel($documentManager, $queryBuilderModel, $provider);
    }
}
