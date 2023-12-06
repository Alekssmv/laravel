<?php

namespace App\Repositories\Traits;

use Illuminate\Support\Facades\Cache;

trait FlushesCache
{
    abstract protected function getCacheTags(): array;
    
    public function flushCache(): void
    {
        Cache::tags($this->cacheTags)->flush();
    }
}

