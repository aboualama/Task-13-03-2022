<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $setting = \App\Models\Setting::create([
        'name' => ' Task 13-03-2022',
        'manger' => ' Mohamed Said Aboualama',
        'phone' => '01234567'.Str::random(2), 
        'email' => 'aboualama@aboualama.com',
        'logo' => 'logo.jpg', 
      ]);
    }
}
