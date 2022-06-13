<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => Role::ADMINISTRATOR]);
        Role::create(['name' => Role::MODERATOR]);
        Role::create(['name' => Role::AUTHOR]);
    }
}
