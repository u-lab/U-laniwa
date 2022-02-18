<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaTableSeeder extends Seeder
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
                'country_code' => 81,
                'prefecture_code' => 9,
                'municipality' => "宇都宮市",
            ],




        ];
        DB::table("areas")->insert($param);
    }
}