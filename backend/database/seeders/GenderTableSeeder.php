<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
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
                'name' => "男性",
            ],
            [
                'name' => "女性",
            ],
            [
                'name' => "その他",
            ],
        ];
        DB::table("genders")->insert($param);
    }
}