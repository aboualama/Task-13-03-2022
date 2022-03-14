<?php

namespace Database\Seeders;

use App\Models\JobStatus;
use Illuminate\Database\Seeder;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['قائمة بالعمل', 'غير قائم بالعمل'];  
        for($i = 0 ; $i < 2 ; $i++)
        { 
            JobStatus::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        }  
    }
}
