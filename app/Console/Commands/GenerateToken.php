<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghost:generate-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '快速生成用戶 token';

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
        $id = $this->ask("請輸入用戶 ID：");

        $user = User::find($id);

        if (! $user) {
            return $this->error('用戶不存在');
        }

        $ttl = 365 * 24 * 60;
        $this->info(auth('api')->setTTL($ttl)->login($user));
    }
}
