<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Notice_genreTableSeeder extends Seeder
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
                'name' => "運営",
                'description' => "U-lab運営からのお知らせ",
            ],
            [
                'name' => "システム",
                'description' => "システム管理者からのお知らせ",
            ],
        ];
        DB::table("notice_genres")->insert($param);
    }
}