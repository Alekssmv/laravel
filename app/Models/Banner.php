<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\HasImageContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Image;

class Banner extends Model implements HasImageContract
{
    use HasFactory;

    const PATH = 'images/banners';

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
