<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $language = $this->getPreferredLanguage($request);
        app()->setLocale($language);

        return $next($request);
    }

    private function getPreferredLanguage(Request $request)
    {
        $acceptLanguage = $request->header('Accept-Language');
        $languages = explode(',', $acceptLanguage);

        foreach ($languages as $language) {
            $locale = strtolower(strtok($language, ';'));
            // Sprawdź, czy dostępne są tłumaczenia dla wybranego języka
            if (in_array($locale, ['en', 'pl'])) {
                return $locale;
            }
        }

        return 'en'; // Domyślny język aplikacji
    }
}