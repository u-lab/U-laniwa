<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Project_belongedTableSeeder extends Seeder
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
                'user_id' => 2,
                'project_id' => 1,
            ],
            [
                'user_id' => 3,
                'project_id' => 1,
            ],
        ];
        DB::table("project_belongeds")->insert($param);
    }
}