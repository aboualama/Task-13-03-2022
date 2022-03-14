<?php

namespace Database\Seeders;

use App\Models\NominationType;
use Illuminate\Database\Seeder;

class NominationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['دائم', 'صندوق', 'موازنة', 'فصل مستقل', 'منتدب'];  
        for($i = 0 ; $i < 5 ; $i++)
        { 
            NominationType::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        } 
    }
}
