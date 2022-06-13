<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::factory(1)->create(
            [
                'key' => Str::slug('Email'),
                'name' => 'Email',
                'value' => 'companyemail@gmail.com',
            ]
        );

        Setting::factory(1)->create(
            [
                'key' => Str::slug('Phone Number'),
                'name' => 'Phone number',
                'value' => '+371 1111 22 33',
            ]
        );

        Setting::factory(1)->create(
            [
                'key' => Str::slug('Facebook link'),
                'name' => 'Facebook link',
                'value' => 'https://www.facebook.com',
            ]
        );

        Setting::factory(1)->create(
            [
                'key' => Str::slug('About text'),
                'name' => 'About text',
                'value' => 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form.',
            ]
        );
    }
}
