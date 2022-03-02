<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

use App\Models\Link;

class LinkObserver
{
    /**
     * 連結保存後觸發的事件
     *
     * @param Link $link
     * @return void
     */
    public function saved(Link $link)
    {
        Cache::forget($link->cacheKey);
    }
}
