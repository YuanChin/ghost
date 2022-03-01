<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SyncLastActivedAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghost:sync-last-actived-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '將用戶最後活躍時間從 Redis 同步到數據庫中';

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
    public function handle(User $user)
    {
        $user->syncLastActivedAt();
        $this->info('同步成功！');
    }
}
