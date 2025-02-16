<?php

namespace App\Service\Language;

use Symfony\Component\HttpFoundation\Request;

class LanguageService
{
    public function setUserLocale(Request $request, string $locale): string
    {
        $request->getSession()->set('_locale', $locale);
        
        $referer = $request->headers->get('referer');
        return $referer;
    }
}