<?php

namespace App\Models;

use App\Services\TranslationService;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'nitrogen', 'phosphorus', 'potassium',
        'netto', 'certification', 'category', 'image', 'is_published',
    ];

    protected function casts(): array
    {
        return ['is_published' => 'boolean'];
    }

    public function getTranslatedNameAttribute(): string
    {
        return app(TranslationService::class)->translateText($this->name, app()->getLocale(), self::class, (int) $this->id, 'name', 'id');
    }

    public function getTranslatedDescriptionAttribute(): string
    {
        return app(TranslationService::class)->translateText($this->description, app()->getLocale(), self::class, (int) $this->id, 'description', 'id');
    }

    public function getTranslatedCategoryAttribute(): string
    {
        return app(TranslationService::class)->translateText($this->category, app()->getLocale(), self::class, (int) $this->id, 'category', 'id');
    }

    public function getTranslatedCertificationAttribute(): string
    {
        return app(TranslationService::class)->translateText($this->certification, app()->getLocale(), self::class, (int) $this->id, 'certification', 'id');
    }
}
