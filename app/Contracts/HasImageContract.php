<?php

namespace App\Contracts;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasImageContract
{
    public function image(): BelongsTo;
}
