<?php

namespace App\Controller;

use App\Service\User\ProfileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/{_locale}/profile', name: 'app_profile', requirements: ['_locale' => 'en|pl|be'])]
    public function index(

        Request $request,
        ProfileService $profileService

    ): Response {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        if ($request->isMethod('POST') && $this->isCsrfTokenValid('profile_update', $request->get('_csrf_token'))) {
            $newUsername = $request->get('username');
            $newPassword = $request->get('password');
            

            $messages = $profileService->updateProfile($user, $newUsername, $newPassword);
            
            foreach ($messages as $type => $messageList) {
                if (is_array($messageList)) {
                    foreach ($messageList as $message) {
                        $this->addFlash($type, $message);
                    }
                } else {
                    $this->addFlash($type, $messageList);
                }
            }
            
            return $this->redirectToRoute('app_profile', ['_locale' => $request->getLocale()]);
        }

        return $this->render('profile/profile/index.html.twig', [
            'user' => $user,
        ]);
    }
}