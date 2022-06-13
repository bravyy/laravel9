<?php

namespace App\Services;

use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Support\Str;

class PageService
{
    public function createPage(StorePageRequest $request): Page
    {
        $validated = $request->validated();

        $page = new Page();
        $page->fill($validated);
        $page->published = !empty($validated['published']) ? 1 : 0;
        $page->show_in_menu = !empty($validated['show_in_menu']) ? 1 : 0;
        $page->slug = Str::slug($page->title);
        $page->save();

        if (Page::query()
                ->where('slug', $page->slug)
                ->where('id', '!=', $page->id)
                ->count() > 0) {
            $page->slug .= '-' . $page->id;
            $page->save();
        }

        return $page;
    }

    public function updatePage(UpdatePageRequest $request, Page $page): Page
    {

        $validated = $request->validated();
        $page->fill($validated);
        if ($page->canUnpublish()) {
            $page->published = !empty($validated['published']) ? 1 : 0;
        }
        $page->show_in_menu = !empty($validated['show_in_menu']) ? 1 : 0;
        $new_slug = Str::slug($page->title);
        if (Page::query()
                ->where('slug', $new_slug)
                ->where('id', '!=', $page->id)
                ->count() > 0) {
            $new_slug .= '-' . $page->id;
        }
        $page->slug = $new_slug;
        $page->save();

        return $page;
    }

    public function deletePage(Page $page)
    {
        if ($page->canBeDeleted()) {
            $page->delete();
        }
    }
}
