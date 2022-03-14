<?php

namespace Database\Seeders;

use App\Models\SubGroup;
use Illuminate\Database\Seeder;

class SubGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

        $arr1 = [
                'لوظائف الطب البشري', 'لوظائف طب الاسنان', 'لوظائف التمريض', 'لوظائف الطب البيطري', 'لوظائف الصيدلة', 'لوظائف الهندسة', 'لوظائف الزراعة', 
                'لوظائف القانون', 'لوظائف الخدمة الاجتماعية', 'لوظائف التعليم', 'لوظائف التغذية والتدبير المنزلي', 'لوظائف الفنون', 'لوظائف الاعلام', 'لوظائف xxxxx', 
                'لوظائف العلوم', 'لوظائف التنمية الادارية', 'لوظائف الامن', 'لوظائف العلاج الطبيعي', 'لوظائف المكتبات والوثائق', 'لوظائف التمويل والمحاسبة', 'لوظائف الامن الصناعي'
                ];  
        for($i = 0 ; $i < 21 ; $i++)
        { 
            SubGroup::create([
                'name' => $arr1[$i], 
                'code' => $i + 1, 
                'functional_group_id' => 1, 
            ]); 
        }  


        $arr2 = ['تمريض وصحه عامة', 'هندسة مساعدة', 'الزراعه والتغذية', 'خدمات اجتماعية', 'فني معمل', 'فنون وعمارة'];  
        for($i = 0 ; $i < 6 ; $i++)
        { 
            SubGroup::create([
                'name' => $arr2[$i], 
                'code' => $i + 1, 
                'functional_group_id' => 2, 
            ]); 
        } 


        $arr3 = ['الوظائف المكتبية']; 
        for($i = 0 ; $i < 1 ; $i++)
        { 
            SubGroup::create([
                'name' => $arr3[$i], 
                'code' => $i + 1, 
                'functional_group_id' => 3, 
            ]); 
        } 


        $arr4 = ['لوظائف الورش والالات', 'لوظائف الزراعه والتغذية', 'لوظائف الحركة والنقل', 'لوظائف الفنون والعمارة']; 
        for($i = 0 ; $i < 4 ; $i++)
        { 
            SubGroup::create([
                'name' => $arr4[$i], 
                'code' => $i + 1, 
                'functional_group_id' => 4, 
            ]); 
        } 


        $arr5 = ['وظائف الخدمات المعاونة']; 
        for($i = 0 ; $i < 1 ; $i++)
        { 
            SubGroup::create([
                'name' => $arr5[$i], 
                'code' => $i + 1, 
                'functional_group_id' => 5, 
            ]); 
        } 
 
    }
}  