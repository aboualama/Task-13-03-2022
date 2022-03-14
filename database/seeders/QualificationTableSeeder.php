<?php

namespace Database\Seeders;

use App\Models\Qualification;
use Illuminate\Database\Seeder;

class QualificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [ 'عالي', 'فوق المتوسط', 'متوسط', 'اعدادية', 'ابتدائية', 'محو امية', 'دبلومة', 'ماجستير', 'دكتوراه'];  
        for($i = 0 ; $i < 9 ; $i++)
        { 
            Qualification::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        } 
    }
}
