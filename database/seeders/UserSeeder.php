<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = User::factory()->create([
            'email' => 'admin@laravel9.test',
            'name' => 'Administrator test',
        ]);
        $administrator->assignRole([Role::ADMINISTRATOR]);


        $moderator = User::factory()->create([
            'email' => 'moderator@laravel9.test',
            'name' => 'Moderator test',
        ]);
        $moderator->assignRole([Role::MODERATOR]);


        $author = User::factory()->create([
            'email' => 'author@laravel9.test',
            'name' => 'Author test',
        ]);
        $author->assignRole([Role::AUTHOR]);
    }
}
