<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 11/15/13
 * Time: 1:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Reference\Factory;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Reference\Model\ReferenceModel;

class ReferenceModelFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $query = new ReferenceModel($documentManager);
        return $query;
    }
}