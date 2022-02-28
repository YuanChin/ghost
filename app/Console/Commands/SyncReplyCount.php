<?php

namespace App\Console\Commands;

use App\Models\Reply;
use Illuminate\Console\Command;

class SyncReplyCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ghost:sync-reply-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '將回覆數量從 Redis 同步到數據庫中';

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
    public function handle(Reply $reply)
    {
        $reply->syncReplyCount();
        $this->info("同步成功！");
    }
}
