<?php
namespace account\Model;

use Mockery as m;
use Zend\ServiceManager\ServiceManager;

class AccountModelServicesTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
    }

    protected function _after()
    {
        m::close();
    }

    // tests
    public function testServicesShouldBeInitialized()
    {
        /** @var \Codeception\Module\ZF2 $module */
        $module = $this->getModule('ZF2');
        /** @var \Zend\Mvc\Application $app */
        $app = $module->application;

        $serviceManager = $app->getServiceManager();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('User\\Identity\\IdentityProvider', m::mock('User\\Identity\\IdentityProvider'));
        /** @var \Account\Model\AccountModel $a */
        $a = $serviceManager->get('AccountModel');

        $this->assertInstanceOf('ZfcRbac\\Service\\AuthorizationService', $a->getAuthorizationService());
        $this->assertInstanceOf('Zend\\EventManager\\EventManagerInterface', $a->getEventManager());
    }
}
