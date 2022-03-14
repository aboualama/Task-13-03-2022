<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MilitaryTreatment;

class MilitaryTreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['معاف نهائي', 'معاف مؤقت', 'مؤجل تجنيده', 'انهي الخدمة'];  
        for($i = 0 ; $i < 4 ; $i++)
        { 
            MilitaryTreatment::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        }  
    }
}
