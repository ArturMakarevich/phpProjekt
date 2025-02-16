<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Games\RollDiceService;
use App\Service\Games\CoinFlipService;
use App\Service\Games\RandomNumberService;

class GamesController extends AbstractController
{
    #[Route('/{_locale}/games', name: 'games', requirements: ['_locale' => 'en|pl|be'])]
    public function games(): Response
    {
        return $this->render('games/index.html.twig');
    }

    #[Route('/{_locale}/games/roll-dice', name: 'games_roll_dice', requirements: ['_locale' => 'en|pl|be'])]
    public function rollDice(RollDiceService $rollDiceService): Response
    {
        $data = $rollDiceService->roll($this->getUser());
        return $this->render('games/roll_dice.html.twig', $data);
    }

    #[Route('/{_locale}/games/flip-coin', name: 'games_flip_coin', requirements: ['_locale' => 'en|pl|be'])]
    public function flipCoin(CoinFlipService $coinFlipService): Response
    {
        $data = $coinFlipService->flip($this->getUser());
        return $this->render('games/flip_coin.html.twig', $data);
    }

    #[Route('/{_locale}/games/random-number', name: 'games_random_number', requirements: ['_locale' => 'en|pl|be'])]
    public function generateRandomNumber(RandomNumberService $randomNumberService): Response
    {
        $data = $randomNumberService->generate($this->getUser());
        return $this->render('games/random_number.html.twig', $data);
    }
}