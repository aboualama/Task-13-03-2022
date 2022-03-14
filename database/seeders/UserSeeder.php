<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = \App\Models\User::create([
        'name' => 'admin',
        'phone' => '01234567'.Str::random(2),
        'email' => 'admin@gmail.com',
        'status' => 'مفعل',
        'password' => bcrypt('123456'),
        'email_verified_at' => now(),
      ]);   
    }
}
