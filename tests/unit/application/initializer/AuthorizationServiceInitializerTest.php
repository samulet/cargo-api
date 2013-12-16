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
}
