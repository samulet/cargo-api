<?php

use Application\Initializer\AuthorizationServiceInitializer;
use Codeception\Util\Stub;
use Mockery as m;

class AuthorizationServiceInitializerTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;
    /**
     * @var AuthorizationServiceInitializer
     */
    protected $service;

    protected function _before()
    {
        $this->service = new AuthorizationServiceInitializer();
    }

    protected function _after()
    {
        m::close();
    }

    // tests
    public function testShouldImplementInitializerInterface()
    {
        $this->assertInstanceOf('Zend\ServiceManager\InitializerInterface', $this->service);
    }

    public function testShouldSetAuthorizationService()
    {
        $instance = m::mock('Application\Service\AuthorizationServiceAwareInterface')
            ->shouldReceive('setAuthorizationService')
            ->andReturn(null)
            ->once()
            ->getMock();
        $serviceLocator = m::mock('Zend\ServiceManager\ServiceManager')
            ->shouldReceive('get')
            ->andReturn(null)
            ->once()
            ->getMock();
        $this->service->initialize($instance, $serviceLocator);
    }

    public function testShouldCheckInterface()
    {
        $instance = m::mock('stdClass')
            ->shouldReceive('setAuthorizationService')
            ->andReturn(null)
            ->never()
            ->getMock();
        $serviceLocator = m::mock('Zend\ServiceManager\ServiceManager')
            ->shouldReceive('get')
            ->andReturn(null)
            ->never()
            ->getMock();
        $this->service->initialize($instance, $serviceLocator);
    }

    /**
     * Проверка правильной настройки сервис-менеджера: при создании экземпляра AccountResource
     * должен вызываться инициализатор
     */
    public function testServiceManagerShouldInitializeService()
    {
        /** @var \Zend\Mvc\Application $app */
        $app = $this->getModule('ZF2')->application;
        $serviceManager = $app->getServiceManager();

        $accountResourceMock = m::mock('Api\V1\Rest\Account\AccountResource')
            ->shouldReceive('setAuthorizationService')
            ->andReturn(null)
            ->once()
            ->getMock();

        $serviceManager->setAllowOverride(true);
        $serviceManager->setService(
            'ZfcRbac\Service\AuthorizationService',
            Stub::makeEmpty('ZfcRbac\Service\AuthorizationService')
        );
        $serviceManager->setFactory(
            'Api\V1\Rest\Account\AccountResource',
            function() use ($accountResourceMock) {return $accountResourceMock;}
        );
        $serviceManager->get('Api\V1\Rest\Account\AccountResource');
    }
}
