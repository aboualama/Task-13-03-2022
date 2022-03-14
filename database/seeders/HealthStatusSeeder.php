<?php

namespace Database\Seeders;

use App\Models\HealthStatus;
use Illuminate\Database\Seeder;

class HealthStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['سليم', 'ضمن نسبة 5%'];  
        for($i = 0 ; $i < 2 ; $i++)
        { 
            HealthStatus::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        }  
    }
}
 