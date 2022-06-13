<?php

namespace App\Services;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(StoreUserRequest $request): User
    {
        $validated = $request->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if ($request->input('roles')) {
            $user->syncRoles($request->input('roles'));
        }

        return $user;
    }

    public function updateUser(UpdateUserRequest $request, User $user): User
    {
        $validated = $request->validated();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($validated['password']) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        $user->syncRoles($request->input('roles') ?? []);

        return $user;
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }
}
