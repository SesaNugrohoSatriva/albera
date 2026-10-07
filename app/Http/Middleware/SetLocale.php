<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    /**
     * Set the application locale based on the request and persisted session state.
     */
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['id', 'en'];
        $locale = $request->query('locale', session('locale', config('app.locale', 'id')));

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = config('app.locale', 'id');
        }

        app()->setLocale($locale);
        session()->put('locale', $locale);

        if ($request->query('locale')) {
            URL::defaults(['locale' => $locale]);
        }

        return $next($request);
    }
}
