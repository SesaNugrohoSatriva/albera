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

    public function translate(?string $text, ?string $locale = null): string
    {
        return $this->translateText($text, $locale);
    }

    public function translateText(?string $text, ?string $locale = null, ?string $model = null, ?int $recordId = null, ?string $field = null, string $sourceLanguage = 'id'): string
    {
        $locale = strtolower($locale ?: app()->getLocale());
        $sourceLanguage = strtolower($sourceLanguage);

        if (blank($text) || $sourceLanguage === $locale || in_array($locale, ['id', 'id_ID'], true)) {
            return (string) $text;
        }

        $cacheKey = $this->buildCacheKey($model, $recordId, $field, $text, $sourceLanguage, $locale, 'text');

        return Cache::remember($cacheKey, now()->addDays(30), function () use ($text, $locale) {
            return $this->provider->translate($text, $locale);
        });
    }

    public function translateRichText(?string $html, ?string $locale = null, ?string $model = null, ?int $recordId = null, ?string $field = null, string $sourceLanguage = 'id'): string
    {
        $locale = strtolower($locale ?: app()->getLocale());
        $sourceLanguage = strtolower($sourceLanguage);

        if (blank($html) || $sourceLanguage === $locale || in_array($locale, ['id', 'id_ID'], true)) {
            return (string) $html;
        }

        $cacheKey = $this->buildCacheKey($model, $recordId, $field, $html, $sourceLanguage, $locale, 'rich_text');

        return Cache::remember($cacheKey, now()->addDays(30), function () use ($html, $locale) {
            return $this->provider->translateRichText($html, $locale);
        });
    }

    protected function buildCacheKey(?string $model, ?int $recordId, ?string $field, string $content, string $sourceLanguage, string $targetLanguage, string $type): string
    {
        return sprintf(
            'translation:v3:%s:%s:%s:%s:%s:%s:%s',
            strtolower($model ?? 'generic'),
            (string) ($recordId ?? 0),
            $field ?? 'content',
            md5($content),
            $sourceLanguage,
            $targetLanguage,
            $type
        );
    }
}
