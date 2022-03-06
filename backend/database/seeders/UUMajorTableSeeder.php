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
            /**
             * 地域創生科学研究科(修士)
             */
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 コミュニティデザイン学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 農業・農村経済学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 建築学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 土木工学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 農業土木学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 グローバル・エリアスタディーズプログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 多文化共生学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "社会デザイン科学専攻 地域人間発達支援学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 光工学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 分子農学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 物質環境化学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 農芸化学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 機械知能工学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 情報電気電子システム工学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 農業生産環境保全学プログラム",
            ],
            [
                'faculty_id' => 6,
                'name' => "工農総合科学専攻 森林生産保全学プログラム",
            ],
            /**
             * 教育学研究科
             */
            [
                'faculty_id' => 7,
                'name' => "教育実践高度化専攻",
            ],
            /**
             * 地域創生科学研究科(博士)
             */
            [
                'faculty_id' => 8,
                'name' => "先端融合科学専攻 オプティクスバイオデザインプログラム",
            ],
            [
                'faculty_id' => 8,
                'name' => "先端融合科学専攻 先端工学システムデザインプログラム",
            ],
            [
                'faculty_id' => 8,
                'name' => "先端融合科学専攻 グローバル地域デザインプログラム",
            ],
            /**
             * 東京農工大学大学院連合農学研究科
             */
            [
                'faculty_id' => 9,
                'name' => "生物生産科学専攻",
            ],
            [
                'faculty_id' => 9,
                'name' => "応用生命科学専攻",
            ],
            [
                'faculty_id' => 9,
                'name' => "環境資源共生科学専攻",
            ],
            [
                'faculty_id' => 9,
                'name' => "農業環境工学専攻",
            ],
            [
                'faculty_id' => 9,
                'name' => "農林共生社会科学専攻",
            ],


        ];
        DB::table("u_u_majors")->insert($param);
    }
}
