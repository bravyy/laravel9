<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\PageController as PublicPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

// Admin routes
Route::group([
    'as' => 'admin.',
    'middleware' => 'auth',
    'prefix' => 'admin',
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('settings', SettingController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::post('settings/update-all', [SettingController::class, 'updateAll'])->name('settings.update-all');
    Route::get('settings/{setting}/delete', [SettingController::class, 'delete'])->name('settings.delete');

    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('pages', PageController::class)->except(['show']);
});

// Public routes
Route::group([
    'prefix' => '/',
], function() {
    Route::get('/', [PublicPageController::class, 'index']);
    Route::get('/{slug}', [PublicPageController::class, 'show'])->name('pages_show');
});
