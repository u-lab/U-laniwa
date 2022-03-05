<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Str;

/**
 * @method  string argument(string $key, string $default = null)
 */
class ChangeSCLevelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'u-laniwa:makeSystemUser {user_name} {user_email} {user_password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'システム管理者を生成するコマンド(創始者ユーザーが招待コードの都合、表向きから作成できないため)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $param = [
            [
                'name' => $this->argument('user_name'),
                'email' => $this->argument('user_email'),
                'email_verified_at' => now(),
                'password' => Hash::make($this->argument('user_password')),
                'remember_token' => Str::random(10),
                'profile_photo_path' => "img/default_profile_photo.png",
                'user_role_id' => 60,
                'created_at' => now(),
                'updated_at' => now(),
                // 'invited_id' => 1,

            ],
        ];
        DB::table("users")->insert($param);
        echo ($this->argument('user_name') . 'を作成しました。');
        return Command::SUCCESS;
    }
}