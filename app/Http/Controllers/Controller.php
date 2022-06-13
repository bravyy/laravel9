<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $BREADCRUMB_NAME = '';
    public static $BREADCRUMB_URL = '';

    public function __construct()
    {
        View::share('settings', Setting::getCollection());
    }

    protected function generateBreadcrumbs(string $page_title = ''): array
    {
        $breadcrumbs = [];

        if (!empty(static::$BREADCRUMB_NAME)) {
            $breadcrumbs[] = [
                'name' => static::$BREADCRUMB_NAME,
                'url' => static::$BREADCRUMB_URL,
            ];
        }

        if (!empty($page_title)) {
            $breadcrumbs[] = [
                'name' => $page_title,
                'url' => '',
            ];
        }

        return $breadcrumbs;
    }
}
