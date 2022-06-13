<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property $url
 *
 * @method published()
 * @method showInMenu()
 */
class Page extends Model
{
    use HasFactory;

    public const HOME_ID = 1;

    protected $fillable = [
        'title',
        'page_title',
        'body',
        'published',
        'show_in_menu',
    ];

    public $appends = [
        'url',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', 1);
    }

    public function scopeShowInMenu(Builder $query): Builder
    {
        return $query->where('show_in_menu', 1);
    }

    public function getUrlAttribute(): string
    {
        if ($this->id === static::HOME_ID) {
            return '/';
        }

        return '/' . $this->slug;
    }

    public function canBeDeleted(): bool
    {
        return $this->id !== static::HOME_ID;
    }

    public function canUnpublish(): bool
    {
        return $this->id !== static::HOME_ID;
    }
}
