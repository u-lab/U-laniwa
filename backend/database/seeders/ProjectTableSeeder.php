<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
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
                'representative_id' => 1,
                'name' => "U-laniwa",
                'description' => "U-lab内部向けシステム。",
                'place_of_activity' => "インターネット",
                'start_date' => Carbon::create(2021, 12, 30),
            ],
        ];
        DB::table("projects")->insert($param);
        \App\Models\Project::factory(20)->create();
    }
}