<?php

namespace Database\Seeders;

use App\Models\SocialStatus;
use Illuminate\Database\Seeder;

class SocialStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['اعزب / أنسة', 'متزوج / متزوجة',  'متزوج ويعول', 'مطلق / مطلقة', 'ارمل / ارملة'];  
        for($i = 0 ; $i < 5 ; $i++)
        { 
            SocialStatus::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        }  
    }
}

//  ['اعزب', 'متزوج', 'مطلق', 'ارمل', 'متزوج ويعول', 'مطلق ويعول', 'ارمل ويعول']); 