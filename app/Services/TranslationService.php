<?php

namespace App\Services;

use App\Contracts\TranslationProvider;
use App\Services\TranslationProviders\LocalTranslationProvider;
use Illuminate\Support\Facades\Cache;

class TranslationService
{
    protected TranslationProvider $provider;

    public function __construct(?TranslationProvider $provider = null)
    {
        $this->provider = $provider ?? new LocalTranslationProvider();
    }

    public function translate(string $text, ?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        if (blank($text) || in_array($locale, ['id', 'id_ID'], true)) {
            return $text;
        }

        $cacheKey = 'translation:'.md5($text.'|id|'.$locale);

        return Cache::remember($cacheKey, now()->addDays(30), function () use ($text, $locale) {
            return $this->provider->translate($text, $locale);
        });
    }
}
