<?php

namespace App\Services\TranslationProviders;

use App\Contracts\TranslationProvider;
use Illuminate\Support\Facades\Http;

class LocalTranslationProvider implements TranslationProvider
{
    protected string $apiUrl;

    protected ?string $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('TRANSLATION_API_URL', 'https://api.mymemory.translated.net/get');
        $this->apiKey = env('TRANSLATION_API_KEY');
    }

    public function translate(?string $text, string $locale): string
    {
        if ($locale !== 'en' || blank($text)) {
            return (string) $text;
        }

        $translated = $this->requestTranslation((string) $text, 'id', 'en');

        if ($translated === null || ! $this->looksLikeValidEnglish($translated, (string) $text)) {
            return (string) $text;
        }

        return trim($translated);
    }

    public function translateRichText(?string $html, string $locale): string
    {
        if ($locale !== 'en' || blank($html)) {
            return (string) $html;
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="UTF-8">'.$html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $this->walkNodes($dom, $locale);

        $translated = $dom->saveHTML();
        $translated = str_replace("\xEF\xBB\xBF", '', $translated);
        $translated = str_replace('<?xml encoding="UTF-8"?>', '', $translated);
        $translated = str_replace('<?xml encoding="UTF-8">', '', $translated);
        $translated = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $translated);

        return $translated;
    }

    protected function requestTranslation(string $text, string $source, string $target): ?string
    {
        if ($this->apiKey && ! str_contains(strtolower($this->apiUrl), 'mymemory')) {
            $response = Http::timeout(30)->withHeaders([
                'Authorization' => 'Bearer '.$this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, [
                'model' => env('TRANSLATION_MODEL', 'gpt-4o-mini'),
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Translate the provided text from Indonesian to English. Use only natural English. Preserve the original meaning and structure. Do not mix Indonesian and English. Return only the translated content without explanations, commentary, or markdown.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $text,
                    ],
                ],
            ]);

            if ($response->failed()) {
                return null;
            }

            $translated = data_get($response->json(), 'choices.0.message.content');

            if (blank($translated)) {
                return null;
            }

            return trim($translated);
        }

        $response = Http::timeout(30)->get($this->apiUrl, [
            'q' => $text,
            'langpair' => $source.'|'.$target,
        ]);

        if ($response->failed()) {
            return null;
        }

        $translated = data_get($response->json(), 'responseData.translatedText');

        if (blank($translated)) {
            return null;
        }

        return trim($translated);
    }

    protected function looksLikeValidEnglish(string $translated, string $source): bool
    {
        $normalizedSource = strtolower(preg_replace('/[^\pL\pN\s]/u', ' ', $source));
        $normalizedTranslated = strtolower(preg_replace('/[^\pL\pN\s]/u', ' ', $translated));

        if (blank($normalizedTranslated) || trim($translated) === trim($source)) {
            return false;
        }

        $indonesianWords = [
            'yang', 'dan', 'untuk', 'dengan', 'pada', 'dari', 'ke', 'di', 'adalah', 'menjadi',
            'tanaman', 'nutrisi', 'ketersediaan', 'pemupukan', 'petani', 'budidaya', 'pertumbuhan',
            'program', 'kondisi', 'agronomis', 'rekomendasi', 'lahan', 'tanah', 'produk', 'pupuk',
        ];

        $matches = 0;
        foreach ($indonesianWords as $word) {
            if (str_contains($normalizedTranslated, $word)) {
                $matches++;
            }
        }

        $wordCount = preg_match_all('/\p{L}+/u', $normalizedTranslated, $matchesAll);

        if ($wordCount === false || $wordCount < 1) {
            return false;
        }

        return $matches / $wordCount < 0.08;
    }

    protected function walkNodes(\DOMNode $node, string $locale): void
    {
        if ($node instanceof \DOMText) {
            $parentTag = strtolower($node->parentNode?->nodeName ?? '');

            if (! in_array($parentTag, ['script', 'style'], true)) {
                $node->nodeValue = $this->translate($node->nodeValue, $locale);
            }

            return;
        }

        foreach ($node->childNodes as $childNode) {
            $this->walkNodes($childNode, $locale);
        }
    }
}
