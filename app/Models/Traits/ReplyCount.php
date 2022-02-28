<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Redis;

use App\Models\Topic;

use Carbon\Carbon;

trait ReplyCount
{
    /**
     * Cache the replycount into Redis
     *
     * @return void
     */
    public function recordReplyCount()
    {
        $hashTable = $this->getHashTableName(); 
        $hashKey = $this->getHashKeyName();

        // 回覆數量
        $replyCount = $this->topic->replies->count();

        Redis::hSet($hashTable, $hashKey, $replyCount);
    }

    /**
     * 同步至數據庫當中
     *
     * @return void
     */
    public function syncReplyCount()
    {
        $hashTable = $this->getHashTableName();

        $datas = Redis::hGetAll($hashTable);

        foreach ($datas as $topic_id => $replyCount) {
            // ex: 將 topic_1 轉變為 1
            $topic_id = str_replace('topic_', '', $topic_id);

            if ($topic = Topic::find($topic_id)) {
                $topic->reply_count = $replyCount;
                $topic->save();
            }
        }

        Redis::del($hashTable);
    }

    /**
     * Get the hash table
     * ex: ghost_reply_count_2022-2-28
     *
     * @return string
     */
    private function getHashTableName()
    {
        return 'ghost_reply_count_' . Carbon::now()->toDateString();
    }

    /**
     * Get the key for the hash table
     * ex: topic_1
     *
     * @return string
     */
    private function getHashKeyName()
    {
        return 'topic_' . $this->topic->id;
    }
}