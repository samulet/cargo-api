<?php
namespace User\Identity;

use User\Model\UserModel;
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
     * @var string
     */
    protected $userId;
    /**
     * @var UserModel
     */
    protected $userModel;

    /**
     * Constructor
     *
     * @param $userId
     * @param UserModel $userModel
     */
    public function __construct($userId, UserModel $userModel)
    {
        $this->userId = $userId;
        $this->userModel = $userModel;
    }

    /**
     * {@inheritDoc}
     */
    public function getIdentity()
    {
        if (empty($this->entity)) {
            $this->entity = $this->userModel->fetch(array('uuid' => $this->userId));
        }
        return $this->entity;
    }
}
