<?php
namespace Account\Assertion;

use Account\Model\AccountModel;
use ZfcRbac\Assertion\AssertionInterface;
use ZfcRbac\Service\AuthorizationService;

class MustBeAdminAssertion implements AssertionInterface
{
    /**
     * Check if this assertion is true
     *
     * @param  AuthorizationService    $authorization
     * @param  \Account\Entity\Account $context
     *
     * @return bool
     */
    public function assert(AuthorizationService $authorization, $context = null)
    {
        /** @var \User\Entity\User $identity */
        $identity = $authorization->getIdentity();
        if ($identity->getUuid() === $context->getCreator()->getUuid()) {
            return true;
        }

        return $authorization->isGranted(AccountModel::PERMISSION_SYSTEM_UPDATE);
    }
}
