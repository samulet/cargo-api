<?php

namespace Application\Service;

interface AuthorizationServiceAwareInterface
{
    /**
     * @param \ZfcRbac\Service\AuthorizationService $authorizationService
     */
    public function setAuthorizationService($authorizationService);

    /**
     * @return \ZfcRbac\Service\AuthorizationService
     */
    public function getAuthorizationService();
}
