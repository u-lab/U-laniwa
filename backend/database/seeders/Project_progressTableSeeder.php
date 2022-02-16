<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Project_progressTableSeeder extends Seeder
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
                'user_id' => 1,
                'date' => Carbon::create(2021, 12, 30),
                'title' => "xx新聞に取り上げられました！",
                'description' => "xxの活動がこの度めでたく、xx付けのxx新聞に取り上げられました！",
            ],
            [
                'project_id' => 1,
                'user_id' => 2,
                'date' => Carbon::create(2021, 12, 31),
                'title' => "xxが決まりました！",
                'description' => "この度xxが決まりました！",
            ],
            [
                'project_id' => 2,
                'user_id' => 3,
                'date' => Carbon::create(2021, 12, 31),
                'title' => "xxが決まりました！",
                'description' => "この度xxが決まりました！",
            ],
        ];
        DB::table("project_progresses")->insert($param);
    }
}