<?php

namespace Database\Seeders;

use App\Models\FunctionalGroup;
use Illuminate\Database\Seeder;

class FunctionGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $arr = [ 'التخصصية', 'الفنية', 'المكتبية', 'الحرفية', 'خدمات معاونة'];  
        for($i = 0 ; $i < 5 ; $i++)
        { 
            FunctionalGroup::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        }  
    }
}
