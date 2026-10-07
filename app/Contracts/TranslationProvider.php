<?php

namespace App\Contracts;

interface TranslationProvider
{
    /**
     * Translate a given text for a target locale.
     */
    public function translate(string $text, string $locale): string;
}
