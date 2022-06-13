<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create all permissions
        $all_permissions = [
            'dashboard_stats',
            'users_index',
            'users_create',
            'users_edit',
            'users_delete',
            'pages_index',
            'pages_create',
            'pages_edit',
            'pages_delete',
            'settings_index',
            'settings_create',
            'settings_edit',
            'settings_delete',
        ];
        foreach ($all_permissions as $permission)   {
            Permission::create([
                'name' => $permission
            ]);
        }


        // Create Moderator permissions
        $moderator_permissions = [
            'dashboard_stats',
            'users_index',
            'pages_index',
            'pages_create',
            'pages_edit',
            'pages_delete',
            'settings_index',
            'settings_create',
            'settings_edit',
        ];
        $role = Role::findByName(Role::MODERATOR);
        foreach ($moderator_permissions as $permission)   {
            $role->givePermissionTo($permission);
        }


        // Create Author permissions
        $author_permissions = [
            'pages_index',
            'pages_create',
            'pages_edit',
        ];
        $role = Role::findByName(Role::AUTHOR);
        foreach ($author_permissions as $permission)   {
            $role->givePermissionTo($permission);
        }
    }
}
