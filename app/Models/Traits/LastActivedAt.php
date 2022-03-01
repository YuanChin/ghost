<?php

namespace App\Models\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

trait LastActivedAt
{
    /**
     * Cache the LastActivedAt into Redis
     *
     * @return void
     */
    public function recordLastActivedAt()
    {
        $hashTable = $this->getHashTableName(Carbon::now()->toDateString());
        $hashKey = $this->getHashKeyName();

        $now = Carbon::now()->toDateTimeString();
        Redis::hSet($hashTable, $hashKey, $now);
    }

    /**
     * 同步至數據庫當中
     *
     * @return void
     */
    public function syncLastActivedAt()
    {
        $hashTable = $this->getHashTableName(Carbon::yesterday()->toDateString());


        $dates = Redis::hGetAll($hashTable);

        foreach ($dates as $user_id => $actived_at) {
            // 將如右 user_1 的字串轉換為 1
            $user_id = str_replace('user_', '', $user_id);

            // 只有當用戶存在時才會同步到數據庫里
            if ($user = $this->find($user_id)) {
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }

        // 同步至數據庫後即可刪除緩存
        Redis::del($hashTable);
    }

    /**
     * last_actived_at 屬性訪問器
     *
     * @param string $value
     * @return string
     */
    public function getLastActivedAtAttribute($value)
    {
        $hashTable = $this->getHashTableName(Carbon::now()->toDateString());
        $hashKey = $this->getHashKeyName();

        $datetime = Redis::hGet($hashTable, $hashKey) ? : $value;

        if ($datetime) {
            return new Carbon($datetime);
        } else {
            return $this->created_at;
        }
    }

    /**
     * Get the hash table
     * ex: ghost_last_actived_at_2022-2-28
     *
     * @return string
     */
    private function getHashTableName($date)
    {
        return 'ghost_last_actived_at_' . $date;
    }

    /**
     * Get the key for the hash table
     * ex: user_1
     *
     * @return string
     */
    private function getHashKeyName()
    {
        return 'user_' . $this->id;
    }
}