<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticeTableSeeder extends Seeder
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
                'genre_id' => 1,
                'date' => Carbon::create(2021, 12, 30),
                'title' => "運営からのテストお知らせ",
                'description' => "これは運営からのテストお知らせです。",
            ],
            [
                'genre_id' => 2,
                'date' => Carbon::create(2022, 1, 30),
                'title' => "システム管理者からのテストお知らせ",
                'description' => "これはシステム管理者からのテストお知らせです。",
            ],
        ];
        DB::table("notices")->insert($param);
    }
}