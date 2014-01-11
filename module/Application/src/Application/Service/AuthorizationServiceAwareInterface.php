<?php
namespace Application\Service;

use ZfcRbac\Service\AuthorizationService;

interface AuthorizationServiceAwareInterface
{
    /**
     * @param \ZfcRbac\Service\AuthorizationService $authorizationService
     */
    public function setAuthorizationService(AuthorizationService $authorizationService);

    /**
     * @return \ZfcRbac\Service\AuthorizationService
     */
    public function getAuthorizationService();
}
