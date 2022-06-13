<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\SiteService;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::query()->published()->where('id', Page::HOME_ID)->firstOrFail();
        $menu = $this->getMenu();

        return view('pages.show', compact('page', 'menu'));
    }

    public function show(string $slug)
    {
        $page = Page::published()
            ->where('slug', $slug)
            ->firstOrFail();
        $menu = $this->getMenu();

        return view('pages.show', compact('page', 'menu'));
    }

    protected function getMenu()
    {
        return SiteService::getMenu();
    }
}
