<?php

namespace App\Models;

use App\Services\TranslationService;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'is_published', 'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function getTranslatedTitleAttribute(): string
    {
        return app(TranslationService::class)->translateText($this->title, app()->getLocale(), self::class, (int) $this->id, 'title', 'id');
    }

    public function getTranslatedExcerptAttribute(): string
    {
        return app(TranslationService::class)->translateText($this->excerpt, app()->getLocale(), self::class, (int) $this->id, 'excerpt', 'id');
    }

    public function getTranslatedContentAttribute(): string
    {
        return app(TranslationService::class)->translateRichText($this->content, app()->getLocale(), self::class, (int) $this->id, 'content', 'id');
    }
}
