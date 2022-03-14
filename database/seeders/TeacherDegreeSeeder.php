<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeacherDegree;

class TeacherDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['استاذ', 'استاذ مساعد',  'مدرس', 'مدرس مساعد', 'معيد', 'استاذ متفرغ', 'استاذ مساعد متفرغ', 'مدرس متفرغ'];  
        for($i = 0 ; $i < 8 ; $i++)
        { 
            TeacherDegree::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        }  
    }
}
