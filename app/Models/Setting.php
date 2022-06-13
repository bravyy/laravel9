<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $key
 * @property $name
 * @property $value
 * @property $created_at
 * @property $updated_at
 */
class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'name',
        'value',
    ];

    public $timestamps = true;

    public static function getCollection(): array
    {
        return Setting::query()
            ->orderBy('id', 'ASC')
            ->pluck('value', 'key')
            ->toArray();
    }
}
