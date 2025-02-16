<?php

namespace App\Controller;

use App\Service\Security\SecurityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SecurityController extends AbstractController
{
    #[Route(path: '/{_locale}/games/login', name: 'app_login', requirements: ['_locale' => 'en|pl|be'])]
    public function login(SecurityService $authService): Response
    {
        $loginData = $authService->getLoginData();
        
        return $this->render('security/login.html.twig', [
            'last_username' => $loginData['last_username'],
            'error' => $loginData['error'],
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}