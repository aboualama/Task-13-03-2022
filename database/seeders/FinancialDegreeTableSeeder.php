<?php

namespace Database\Seeders;

use App\Models\FinancialDegree;
use Illuminate\Database\Seeder;

class FinancialDegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [ 'كبير', 'أولي', 'ثانية', 'ثالثة', 'رابعة', 'خامسة', 'سادسة'];  
        for($i = 0 ; $i < 7 ; $i++)
        { 
            FinancialDegree::create([
                'name' => $arr[$i], 
                'code' => ($arr[$i] == 'كبير') ? 'ك' : $i, 
            ]); 
        } 
    }
}
