<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_qualificationTableSeeder extends Seeder
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
                'name' => "第３級アマチュア無線技師",
                'description' => "モールス信号やりたくて取りました",
                'date_of_acquisition' => Carbon::create(2021, 5, 30),
            ],
            [
                'user_id' => 1,
                'name' => "マナー・プロトコール検定",
                'date_of_acquisition' => Carbon::create(2020, 5, 30),
            ],
        ];
        DB::table("user_qualifications")->insert($param);
    }
}