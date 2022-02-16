<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_linkTableSeeder extends Seeder
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
                'url' => "https://pf.usuyuki.net/",
                'name' => "四代目ポートフォリオ",
                'description' => "next.jsによるポートフォリオです。",
            ],
            [
                'user_id' => 1,
                'url' => "https://twitter.com/usuyuki26",
                'name' => "Twitter",
            ],
        ];
        DB::table("user_links")->insert($param);
    }
}