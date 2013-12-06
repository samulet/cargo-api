<?php
namespace Reference;

use Zend\Db\ResultSet\ResultSet;
use Reference\Model\ReferenceModel;
use Reference\Entity\ReferenceList;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),

        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {

        return array(
            'factories' => array(
                'ReferenceModel' => 'Reference\Factory\ReferenceModelFactory',
                'Reference\Entity\ReferenceList' => function ($sm) {
                    return new ReferenceList();
                },
            ),
        );
    }

}