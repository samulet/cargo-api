<?php
namespace User\Factory;

use User\Model\UserModel;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserModelFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Zend\Authentication\AuthenticationService $authentication */
        $authentication = $serviceLocator->get('authentication');
        /** @var \ZF\MvcAuth\Identity\IdentityInterface $identity */
        $identity = $authentication->getIdentity();

        /** @var \Doctrine\ODM\MongoDB\DocumentManager $documentManager */
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        /** @var \QueryBuilder\Model\QueryBuilderModel $queryBuilderModel */
        $queryBuilderModel = $serviceLocator->get('QueryBuilderModel');

        return new UserModel($documentManager, $queryBuilderModel, $identity);
    }
}
