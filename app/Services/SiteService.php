<?php

namespace App\Services;

use App\Models\Page;

class SiteService
{
    public static function getMenu(int $limit = 5): array
    {
        return Page::published()
            ->showInMenu()
            ->orderBy('id', 'ASC')
            ->select([
                'id', 'title', 'slug',
            ])
            ->take($limit)
            ->get()
            ->toArray();
    }
}
