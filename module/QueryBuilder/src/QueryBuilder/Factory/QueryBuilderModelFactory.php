<?php
/**
 * Created by JetBrains PhpStorm.
 * User: salerat
 * Date: 11/15/13
 * Time: 1:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace QueryBuilder\Factory;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use QueryBuilder\Model\QueryBuilderModel;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\MongoDB\Hydrator\HydratorFactory;

class QueryBuilderModelFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $documentManager = $serviceLocator->get('doctrine.documentmanager.odm_default');
        $query = new QueryBuilderModel($documentManager);
        return $query;
    }
}