<?php

namespace Database\Seeders;

use App\Models\JobStyle;
use Illuminate\Database\Seeder;

class JobStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [ 'تثبيت باب اول', 'أوائل خريجين', 'حملة ماجستير ودكتوراه', 'تكليف', 'محول اداري', 'تعاقد', 'مصابي الثورة', '5%', 'اعادة تعيين للحصول علي المؤهل الاعلي اثناء الخدمة', 'بالأعلان', 'عادي (للمعينين بالقوي العاملة)', 'منقول من خارج الجامعة', 'تثبيت صناديق'];  
        for($i = 0 ; $i < 13 ; $i++)
        { 
            JobStyle::create([
                'name' => $arr[$i], 
                'code' => $i + 1, 
            ]); 
        } 
    }
}
