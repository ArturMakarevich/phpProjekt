<?php
namespace App\Controller;

use App\Service\User\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{   
    #[Route('/admin/users', name: 'user_list')]
    public function listUsers(UserService $userService): Response
    {
        $users = $userService->getAllUsers();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }
}