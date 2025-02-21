<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\User\RegistrationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegistrationController extends AbstractController
{
    #[Route('/{_locale}/games/register', name: 'app_register', requirements: ['_locale' => 'en|pl|be'])]
    public function register(
        Request $request, 
        RegistrationService $registrationService
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $registrationService->registerUser(
                $user,
                $form->get('plainPassword')->getData()
            );

            $this->addFlash('success', 'User <strong>' . $user->getUsername() . '</strong> with email <strong>' . $user->getEmail() . '</strong> successfully registered.');
        }      

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}