<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 11/15/13
 * Time: 1:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Account\Factory;

use Zend\Log\Exception\InvalidArgumentException;
use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Account\Model\AccountModel;
class AccountModelFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $acc = new AccountModel($documentManager);
        return $acc;
    }
}