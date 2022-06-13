<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [];
        $user = Auth::user();

        if ($user->hasPermissionTo('dashboard_stats')) {
            $stats['pages'] = Page::count();
            $stats['users'] = User::count();
            $stats['settings'] = Setting::count();
        }

        return view('admin.dashboard.index', compact('stats', 'user'));
    }
}
