<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

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
    protected $signature = 'sc:changeLevel  {user_id} {role_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SecurityClearanceのレベルを変更する';

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
        User::where('id', $this->argument('user_id'))->update(['user_role_id' =>  $this->argument('role_id')]);
        echo ('user_id:' . $this->argument('user_id') . 'をuser_role_id:' . $this->argument('role_id') . 'に変更しました。');
        return Command::SUCCESS;
    }
}