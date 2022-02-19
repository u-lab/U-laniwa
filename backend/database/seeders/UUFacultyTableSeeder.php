<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UUFacultyTableSeeder extends Seeder
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
                'name' => "共同教育学部(教育学部)",
            ],
            [
                'name' => "工学部",
            ],
            [
                'name' => "国際学部",
            ],
            [
                'name' => "地域デザイン科学部",
            ],
            [
                'name' => "農学部",
            ],
            //院
            // [
            //     'name' => "地域創生科学研究科",
            // ],
            // [
            //     'name' => "教育学研究科",
            // ],
            // [
            //     'name' => "連合農学研究科",
            // ],

        ];
        DB::table("u_u_faculties")->insert($param);
    }
}