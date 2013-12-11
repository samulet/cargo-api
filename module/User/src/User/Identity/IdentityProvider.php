<?php
namespace User\Identity;

use User\Entity\User;
use Zend\Authentication\AuthenticationService;
use ZfcRbac\Exception;
use ZfcRbac\Identity\IdentityProviderInterface;

/**
 * This provider uses the Zend authentication service to fetch the identity
 */
class IdentityProvider implements IdentityProviderInterface
{
    /**
     * @var \User\Entity\User
     */
    protected $entity;

    /**
     * Constructor
     *
     * @param \User\Entity\User $entity
     */
    public function __construct(User $entity)
    {
        $this->entity = $entity;
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentity()
    {
        return $this->entity;
    }
}
