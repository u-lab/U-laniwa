<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Project_participation_requestTableSeeder extends Seeder
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
                'project_id' => 1,
                'user_id' => 4,
                'comment' => "あまりにも素敵で、参加したくなっちゃいました",
            ],
            [
                'project_id' => 1,
                'user_id' => 5,
                'comment' => "参加希望いたします。",
            ],
        ];
        DB::table("project_participation_requests")->insert($param);
    }
}