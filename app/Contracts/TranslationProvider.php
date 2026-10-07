<?php

namespace App\Contracts;

interface TranslationProvider
{
    public function translate(?string $text, string $locale): string;

    public function translateRichText(?string $html, string $locale): string;
}
