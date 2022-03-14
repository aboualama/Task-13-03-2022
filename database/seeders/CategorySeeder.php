<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr1 = ['اخبار اليوم', 'سياسه دولية', 'رياضة محلية']; 
        $arr2 = ['اخبار اخبار اخبار اخبار اخبار اخبار', 'سياسه سياسه سياسه سياسه سياسه سياسه', 'رياضة رياضة رياضة رياضة رياضة رياضة'];  
        for($i = 0 ; $i < 3 ; $i++)
        { 
            Category::create([
                'title'       => $arr1[$i],
                'description' => $arr2[$i],
                'slug'        => Str::slug($arr1[$i] , '-'),
            ]); 
        }  
    }
}
