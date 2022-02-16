<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'name' => "学部1年",
            ],
            [
                'name' => "学部2年",
            ],
            [
                'name' => "学部3年",
            ],
            [
                'name' => "学部4年",
            ],
            [
                'name' => "修士1年",
            ],
            [
                'name' => "修士2年",
            ],
            [
                'name' => "博士1年",
            ],
            [
                'name' => "博士2年",
            ],
            [
                'name' => "博士3年",
            ],
            [
                'name' => "社会人",
            ],
            [
                'name' => "その他",
            ],
        ];
        DB::table("grades")->insert($param);
    }
}