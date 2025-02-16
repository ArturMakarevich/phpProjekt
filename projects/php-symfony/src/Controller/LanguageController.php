<?php
namespace App\Controller;

use App\Service\Language\LanguageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    #[Route('/language/{locale}', name: 'set_language')]
    public function setLanguage(
        Request $request,
        string $locale,
        LanguageService $languageService
    ): RedirectResponse {
        $referer = $languageService->setUserLocale($request, $locale);
        return new RedirectResponse($referer);
    }
}