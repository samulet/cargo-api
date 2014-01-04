<?php
namespace place;

use Codeception\Util\Debug;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Mockery as m;
use Place\Model\PlaceModel;
use Zend\ServiceManager\ServiceManager;

class CreateTest extends \Codeception\TestCase\Test
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;
    /**
     * @var ServiceManager
     */
    protected $serviceManager;
    /**
     * @var HydratorInterface
     */
    protected $hydrator;
    /**
     * @var \User\Entity\User
     */
    protected $user;

    protected function _before()
    {
        /** @var \Zend\Mvc\Application $app */
        $app = $this->getModule('ZF2')->application;
        $this->serviceManager = $app->getServiceManager();
        $dm = $this->serviceManager->get('doctrine.documentmanager.odm_default');
        $this->hydrator = $dm->getHydratorFactory();
        $this->user = $dm->getRepository('User\Entity\User')
                         ->findOneBy(array('uuid' => '93456a97789c4538ba8d0e8d7419e658'));
        $this->serviceManager->setAllowOverride(true);
    }

    protected function _after()
    {
        m::close();
    }

    // tests
    public function testReturnEntityAfterCreating()
    {
        $model = new PlaceModel($this->getDoctrineManager(), $this->getIdentityProvider($this->user));
        $model->setEventManager($this->getEventManager());
        $model->setHydrator($this->hydrator);
        $entity = $model->create(array());
        $this->assertInstanceOf('Place\\Entity\\PlaceEntity', $entity);
    }

    public function testMethodShouldTwiceTriggerEvents()
    {
        $model = new PlaceModel($this->getDoctrineManager(), $this->getIdentityProvider($this->user));
        $model->setEventManager($this->getEventManager());
        $model->setHydrator($this->hydrator);
        $model->create(array());
    }

    protected function getIdentityProvider($identity = null)
    {
        $provider = m::mock('User\\Identity\\IdentityProvider')
            ->shouldReceive('getIdentity')
            ->andReturn($identity)
            ->once()
            ->getMock();
        return $provider;
    }

    protected function getDoctrineManager()
    {
        $manager = m::mock('Doctrine\\ODM\\MongoDB\\DocumentManager');
        $manager->shouldReceive('persist')
            ->andReturn(null)
            ->once();
        $manager->shouldReceive('flush')
            ->andReturn(null)
            ->once();
        return $manager;
    }

    protected function getEventManager()
    {
        $manager = m::mock('Zend\\EventManager\\EventManager');
        $manager->shouldReceive('trigger')
            ->andReturn(null)
            ->twice();
        $manager->shouldReceive('setIdentifiers')
            ->andReturn(null)
            ->once();
        return $manager;
    }
}
