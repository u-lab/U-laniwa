<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
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
                'id' => 1,
                'name' => "退部",
                'description' => "引退とは別。退部後このランクになる。n日後に削除される",
            ],
            //【SecurityClearance:level1】
            [
                'id' => 10,
                'name' => "外部",
                'description' => "",
            ],
            //【SecurityClearance:level2】
            [
                'id' => 20,
                'name' => "仮入部",
                'description' => "",
            ],
            //【SecurityClearance:level3】
            [
                'id' => 30,
                'name' => "OB・OG",
                'description' => "",
            ],
            //【SecurityClearance:level4】
            [
                'id' => 40,
                'name' => "本入部",
                'description' => "",
            ],
            //【SecurityClearance:level5】
            [
                'id' => 50,
                'name' => "運営",
                'description' => "",
            ],
            [
                'id' => 51,
                'name' => "会計",
                'description' => "",
            ],
            [
                'id' => 52,
                'name' => "書記",
                'description' => "",
            ],
            [
                'id' => 53,
                'name' => "サーバードメイン管理",
                'description' => "",
            ],
            [
                'id' => 54,
                'name' => "Notion管理",
                'description' => "",
            ],
            [
                'id' => 55,
                'name' => "Slack,Discord管理 ",
                'description' => "",
            ],
            //【SecurityClearance:level6】
            [
                'id' => 60,
                'name' => "システム管理",
                'description' => "",
            ],
            //【SecurityClearance:level7】
            [
                'id' => 70,
                'name' => "代表",
                'description' => "",
            ],

        ];
        DB::table("user_roles")->insert($param);
    }
}