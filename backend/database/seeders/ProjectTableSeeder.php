<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
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
                'representative_id' => 1,
                'name' => "U-laniwa",
                'description' => "U-lab内部向けシステム。",
                'place_of_activity' => "インターネット",
                'start_date' => Carbon::create(2021, 12, 30),
            ],
            [
                'representative_id' => 2,
                'name' => "石からコーヒーを作る",
                'description' => "石からコーヒーを作るプロジェクトです",
                'place_of_activity' => "峰キャンパス",
                'start_date' => Carbon::create(2021, 12, 30),
                'end_date' => Carbon::create(2022, 2, 12),
            ],
            [
                'representative_id' => 3,
                'name' => "2年生交流プロジェクト",
                'description' => "交流の少ない2年生同士が交流を目指すプロジェクトです",
                'place_of_activity' => "陽東キャンパス",
                'start_date' => Carbon::create(2022, 2, 16),
            ],
        ];
        DB::table("projects")->insert($param);
    }
}