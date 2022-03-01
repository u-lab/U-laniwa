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
            /**
             * 教育学部
             */
            /**
             * 共同教育学部
             */
            [
                'faculty_id' => 1,
                'name' => "学校教育教員養成課程教育人間科学系",
            ],
            [
                'faculty_id' => 1,
                'name' => "学校教育教員養成課程人文社会系",
            ],
            [
                'faculty_id' => 1,
                'name' => "学校教育教員養成課程自然科学系",
            ],
            [
                'faculty_id' => 1,
                'name' => "学校教育教員養成課程芸術・生活・健康系",
            ],
            /**
             * 旧体制　工学部
             */
            [
                'faculty_id' => 2,
                'name' => "応用化学科",
            ],
            [
                'faculty_id' => 2,
                'name' => "機械システム工学科",
            ],
            [
                'faculty_id' => 2,
                'name' => "電気電子分野工学科",
            ],
            [
                'faculty_id' => 2,
                'name' => "情報工学科",
            ],
            /**
             * 工学部
             */
            [
                'faculty_id' => 2,
                'name' => "基盤工学科(コース配属まだ)",
            ],
            [
                'faculty_id' => 2,
                'name' => "基盤工学科物質環境科学コース",
            ],
            [
                'faculty_id' => 2,
                'name' => "基盤工学科機械システム工学コース",
            ],
            [
                'faculty_id' => 2,
                'name' => "基盤工学科情報電子オプティクスコース電気電子分野",
            ],
            [
                'faculty_id' => 2,
                'name' => "基盤工学科情報電子オプティクスコース情報科学分野",
            ],
            /**
             * 国際学部
             */
            [
                'faculty_id' => 3,
                'name' => "国際学科",
            ],
            /**
             * 地域デザイン科学部
             */
            [
                'faculty_id' => 4,
                'name' => "コミュニティデザイン学科",
            ],
            [
                'faculty_id' => 4,
                'name' => "建築都市デザイン学科",
            ],
            [
                'faculty_id' => 4,
                'name' => "社会基盤デザイン学科",
            ],
            /**
             * 農学部
             */
            [
                'faculty_id' => 5,
                'name' => "生物資源科学科",
            ],
            [
                'faculty_id' => 5,
                'name' => "応用生命化学科",
            ],
            [
                'faculty_id' => 5,
                'name' => "農業環境工学科",
            ],
            [
                'faculty_id' => 5,
                'name' => "農業経済学科",
            ],
            [
                'faculty_id' => 5,
                'name' => "森林科学科",
            ],

        ];
        DB::table("u_u_majors")->insert($param);
    }
}