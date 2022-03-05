<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;


class ChangeMainEntranceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sc:changeToMain {user_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '指定のユーザーを本入部にする';

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
        User::where('id', $this->argument('user_id'))->update(['user_role_id' => 40]);
        echo ('user_id:' . $this->argument('user_id') . 'を本入部に変更しました。');
        return Command::SUCCESS;
    }
}