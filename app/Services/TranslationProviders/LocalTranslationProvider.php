<?php

namespace App\Services\TranslationProviders;

use App\Contracts\TranslationProvider;

class LocalTranslationProvider implements TranslationProvider
{
    /**
     * Small dictionary for known database text values. This keeps the structure
     * open for a future external provider without forcing any hardcoded API keys.
     */
    public function translate(string $text, string $locale): string
    {
        if ($locale === 'id' || $text === '') {
            return $text;
        }

        $dictionary = [
            'id' => [
                // reserved for future Indonesian-specific lookups if needed
            ],
            'en' => [
                'Beranda' => 'Home',
                'Tentang kami' => 'About us',
                'Tentang ALBERA' => 'About ALBERA',
                'Visi & Misi' => 'Vision & Mission',
                'Direksi' => 'Board of Directors',
                'Produk' => 'Products',
                'Artikel' => 'Articles',
                'Kontak' => 'Contact',
                'Hubungi kami' => 'Contact us',
                'Jelajahi' => 'Explore',
                'Temui kami' => 'Visit us',
                'Pupuk Berkualitas Tinggi' => 'High-Quality Fertilizer',
                'Produktivitas dan Efisiensi' => 'Productivity and Efficiency',
                'Mitra Terpercaya' => 'Trusted Partner',
                'Hubungi ALBERA' => 'Contact ALBERA',
                'Tanyakan produk ini' => 'Ask about this product',
                'Katalog' => 'Catalogue',
                'Produk Unggulan' => 'Featured Products',
                'Lihat detail' => 'View details',
                'Baca artikel' => 'Read article',
                'Baca juga' => 'Read more',
                'Lebih banyak insight.' => 'More insights.',
                'ALBERA Journal' => 'ALBERA Journal',
                'Insight ALBERA' => 'ALBERA insight',
                'Terus tumbuh bersama pertanian Indonesia.' => 'Keep growing with Indonesian agriculture.',
                'Temukan solusi yang tepat untuk kebutuhan pertanian Anda.' => 'Find the right solution for your agriculture needs.',
                'Hubungi ALBERA' => 'Contact ALBERA',
                'Mari bicarakan kebutuhan Anda.' => 'Let’s talk about your needs.',
            ],
        ];

        $target = strtolower($locale);

        return $dictionary[$target][$text] ?? $text;
    }
}
