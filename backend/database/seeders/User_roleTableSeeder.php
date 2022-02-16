<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            //【SecurityClearance:level0】
            [
                'role_id' => 1,
                'name' => "退部",
                'description' => "引退とは別。退部後このランクになる。n日後に削除される",
            ],
            //【SecurityClearance:level1】
            [
                'role_id' => 10,
                'name' => "外部",
                'description' => "",
            ],
            //【SecurityClearance:level2】
            [
                'role_id' => 20,
                'name' => "仮入部",
                'description' => "",
            ],
            //【SecurityClearance:level3】
            [
                'role_id' => 30,
                'name' => "OB・OG",
                'description' => "",
            ],
            //【SecurityClearance:level4】
            [
                'role_id' => 40,
                'name' => "本入部",
                'description' => "",
            ],
            //【SecurityClearance:level5】
            [
                'role_id' => 50,
                'name' => "運営",
                'description' => "",
            ],
            [
                'role_id' => 51,
                'name' => "会計",
                'description' => "",
            ],
            [
                'role_id' => 52,
                'name' => "書記",
                'description' => "",
            ],
            [
                'role_id' => 53,
                'name' => "サーバードメイン管理",
                'description' => "",
            ],
            [
                'role_id' => 54,
                'name' => "Notion管理",
                'description' => "",
            ],
            [
                'role_id' => 55,
                'name' => "Slack,Discord管理 ",
                'description' => "",
            ],
            //【SecurityClearance:level6】
            [
                'role_id' => 60,
                'name' => "システム管理",
                'description' => "",
            ],
            //【SecurityClearance:level7】
            [
                'role_id' => 70,
                'name' => "代表",
                'description' => "",
            ],

        ];
        DB::table("user_roles")->insert($param);
    }
}