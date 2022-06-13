<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreSettingRequest;
use App\Http\Requests\Setting\UpdateAllSettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SettingController extends Controller
{
    public static $BREADCRUMB_NAME = 'Settings';
    public static $BREADCRUMB_URL = '/admin/settings';

    public function index()
    {
        abort_unless(Gate::allows('settings_index'), 403);

        return view('admin.settings.index', [
            'settings' => Setting::query()->orderBy('key', 'ASC')->get(),
            'breadcrumbs' => $this->generateBreadcrumbs(),
        ]);
    }

    public function create()
    {
        abort_unless(Gate::allows('settings_create'), 403);

        $page_title = 'Add Setting';

        return view('admin.settings.create', [
            'page_title' => $page_title,
            'breadcrumbs' => $this->generateBreadcrumbs($page_title),
        ]);
    }

    public function store(StoreSettingRequest $request)
    {
        abort_unless(Gate::allows('settings_create'), 403);

        $validated = $request->validated();
        $key = Str::slug($validated['name']);
        $validated['key'] = $key;

        // Ensure setting key is unique
        if (Setting::query()->where('key', $key)->count() > 0) {
            throw ValidationException::withMessages([
                'name' => __('Such name is already taken, please choose a different one'),
            ]);
        }

        Setting::create($validated);

        return redirect(route('admin.settings.index'))
            ->with('status', __('New setting created successfully'));
    }

    public function updateAll(UpdateAllSettingRequest $request)
    {
        abort_unless(Gate::allows('settings_edit'), 403);

        collect($request->settings)
            ->filter(fn($value, $key) => !empty($value))
            ->each(fn($value, $key) => Setting::query()->where('key', $key)->update(['value' => $value]));

        return redirect(route('admin.settings.index'))
            ->with('status', __('Settings updated successfully'));
    }

    public function delete(Setting $setting)
    {
        abort_unless(Gate::allows('settings_delete'), 403);

        $setting->delete();

        return redirect(route('admin.settings.index'))
            ->with('status', __('Setting ' . $setting->name . ' deleted successfully'));
    }
}
