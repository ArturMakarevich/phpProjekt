<?php

namespace App\Service\Security;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityService
{
    private $authenticationUtils;

    public function __construct(AuthenticationUtils $authenticationUtils)
    {
        $this->authenticationUtils = $authenticationUtils;
    }

    public function getLoginData(): array
    {
        return [
            'last_username' => $this->authenticationUtils->getLastUsername(),
            'error' => $this->authenticationUtils->getLastAuthenticationError()
        ];
    }
}