<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;
use App\Services\PageService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public static $BREADCRUMB_NAME = 'Pages';
    public static $BREADCRUMB_URL = '/admin/pages';

    public function index()
    {
        abort_unless(Gate::allows('pages_index'), 403);

        return view('admin.pages.index', [
            'pages' => Page::query()->orderBy('id', 'ASC')->get(),
            'breadcrumbs' => $this->generateBreadcrumbs(),
        ]);
    }

    public function create()
    {
        abort_unless(Gate::allows('pages_create'), 403);

        $page_title = 'Add Page';

        return view('admin.pages.create', [
            'page_title' => $page_title,
            'breadcrumbs' => $this->generateBreadcrumbs($page_title),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Page\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request, PageService $page_service)
    {
        abort_unless(Gate::allows('pages_create'), 403);

        $page_service->createPage($request);

        return redirect(route('admin.pages.index'))
            ->with('status', __('Page created successfully'));

    }

    public function edit(Page $page)
    {
        abort_unless(Gate::allows('pages_edit'), 403);

        $page_title = 'Edit Page';

        return view('admin.pages.edit', [
            'page_title' => $page_title,
            'page' => $page,
            'breadcrumbs' => $this->generateBreadcrumbs($page_title),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Page\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page, PageService $page_service)
    {
        abort_unless(Gate::allows('pages_edit'), 403);

        $page_service->updatePage($request, $page);

        return redirect()
            ->back()
            ->with('status', __('Page updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page, PageService $page_service)
    {
        $page_service->deletePage($page);

        return redirect(route('admin.pages.index'))
            ->with('status', __('Page ' . $page->name . ' deleted successfully'));

    }
}
