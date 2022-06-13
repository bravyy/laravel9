<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => 'Home',
            'page_title' => 'Home',
            'slug' => Str::slug('Home'),
            'body' => '',
            'published' => 1,
            'show_in_menu' => 1,
        ]);

        Page::create([
            'title' => 'About',
            'page_title' => 'About Us',
            'slug' => Str::slug('About'),
            'body' => '',
            'published' => 1,
            'show_in_menu' => 1,
        ]);

        Page::create([
            'title' => 'Contact',
            'page_title' => 'Contact Us',
            'slug' => Str::slug('Contact'),
            'body' => '',
            'published' => 1,
            'show_in_menu' => 1,
        ]);
    }
}
