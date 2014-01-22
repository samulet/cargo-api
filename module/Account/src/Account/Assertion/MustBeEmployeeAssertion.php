<?php
namespace Account\Assertion;

use Account\Model\AccountModel;
use ZfcRbac\Assertion\AssertionInterface;
use ZfcRbac\Service\AuthorizationService;

class MustBeEmployeeAssertion implements AssertionInterface
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
        if (empty($context)) {
            return true;
        }

        /** @var \User\Entity\User $identity */
        $identity = $authorization->getIdentity();

        if (in_array($identity->getUuid(), $context->getStaff())) {
            return true;
        }

        return $authorization->isGranted(AccountModel::PERMISSION_SYSTEM_READ);
    }
}
