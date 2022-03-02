<?php

namespace app\Models\Traits;

use Illuminate\Support\Facades\Cache;

trait RecommendedResource
{
    /**
     * The name of the cache key.
     *
     * @var string
     */
    public $cacheKey = "ghost_recommended_resource";

    /**
     * The seconds of the cache's expiration
     *
     * @var int
     */
    protected $cacheExpireInSeconds = 1440 * 60;

    /**
     * Get the recommended resources from the cache
     *
     * @return mixed
     */
    public function getRecommendedResources()
    {
        return Cache::remember($this->cacheKey, $this->cacheExpireInSeconds, function () {
            return $this->all();
        });
    }
}