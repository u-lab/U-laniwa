<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_belonged_organizationTableSeeder extends Seeder
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
                'user_id' => 1,
                'name' => "学生団体xxx",
                'description' => "xxxする学生団体です。",
                'start_date' => Carbon::create(2020, 5, 30),
                'end_date' => Carbon::create(2021, 12, 30),
            ],
            [
                'user_id' => 1,
                'name' => "学生団体ooo",
                'description' => "oooする学生団体です。",
                'start_date' => Carbon::create(2020, 5, 30),
            ],
        ];
        DB::table("user_belongeds")->insert($param);
    }
}