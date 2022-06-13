<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public static $BREADCRUMB_NAME = 'Users';
    public static $BREADCRUMB_URL = '/admin/users';

    public function index()
    {
        return view('admin.users.index', [
            'users' => User::query()->orderBy('id', 'ASC')->get(),
            'breadcrumbs' => $this->generateBreadcrumbs(),
        ]);
    }

    public function create()
    {
        $page_title = 'Add User';

        return view('admin.users.create', [
            'page_title' => $page_title,
            'roles' => Role::all(),
            'breadcrumbs' => $this->generateBreadcrumbs($page_title),
        ]);
    }

    public function store(StoreUserRequest $request, UserService $user_service)
    {
        $user_service->createUser($request);

        return redirect(route('admin.users.index'))
            ->with('status', __('New user created successfully'));
    }

    public function edit(User $user)
    {
        $page_title = 'Edit User';

        return view('admin.users.edit', [
            'page_title' => $page_title,
            'user' => $user,
            'roles' => Role::all(),
            'breadcrumbs' => $this->generateBreadcrumbs($page_title),
        ]);
    }


    public function update(UpdateUserRequest $request, User $user, UserService $user_service)
    {
        $user_service->updateUser($request, $user);

        return redirect(route('admin.users.edit', $user->id))
            ->with('status', __('User ' . $user->name . ' updated successfully'));
    }


    public function destroy(User $user, UserService $user_service)
    {
        $user_service->deleteUser($user);

        return redirect(route('admin.users.index'))
            ->with('status', __('User ' . $user->name . ' deleted successfully'));
    }
}
