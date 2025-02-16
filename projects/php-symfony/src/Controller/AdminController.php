<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\CoinFlipRepository;
use App\Repository\RandomNumberRepository;
use App\Repository\RollDiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'admin_dashboard')]
    public function dashboard(
        UserRepository $userRepository,
        CoinFlipRepository $coinFlipRepository,
        RandomNumberRepository $randomNumberRepository,
        RollDiceRepository $rollDiceRepository
    ): Response {
        $users = $userRepository->findAll();
        
        $statistics = [];
        foreach ($users as $user) {
            $statistics[] = [
                'user' => $user,
                'games' => [
                    'coinFlip' => [
                        'total' => $user->getCoinFlips()->count(),
                        'results' => $this->getGameResults($user->getCoinFlips())
                    ],
                    'randomNumber' => [
                        'total' => $user->getRandomNumbers()->count(),
                        'results' => $this->getGameResults($user->getRandomNumbers())
                    ],
                    'rollDice' => [
                        'total' => $user->getRollDices()->count(),
                        'results' => $this->getGameResults($user->getRollDices())
                    ]
                ]
            ];
        }

        return $this->render('admin/dashboard.html.twig', [
            'statistics' => $statistics
        ]);
    }

    private function getGameResults($games): array
    {
        $results = [];
        foreach ($games as $game) {
            if (method_exists($game, 'getResult')) {
                $results[] = $game->getResult();
            } elseif (method_exists($game, 'getNumresult')) {
                $results[] = $game->getNumresult();
            } elseif (method_exists($game, 'getRoll')) {
                $results[] = $game->getRoll();
            }
        }
        return $results;
    }
}