<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UUMajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            //学部
            [
                'faculty_id' => 1,
                'name' => "共同教育学部(教育学部)",
            ],
            [
                'faculty_id' => 2,
                'name' => "工学部",
            ],
            [
                'faculty_id' => 3,
                'name' => "国際学部",
            ],
            [
                'faculty_id' => 4,
                'name' => "地域デザイン科学部",
            ],
            [
                'faculty_id' => 5,
                'name' => "農学部",
            ],
            //院
            [
                'faculty_id' => 6,
                'name' => "地域創生科学研究科",
            ],
            [
                'faculty_id' => 7,
                'name' => "教育学研究科",
            ],
            [
                'faculty_id' => 8,
                'name' => "連合農学研究科",
            ],

        ];
        DB::table("u_u_majors")->insert($param);
    }
}
