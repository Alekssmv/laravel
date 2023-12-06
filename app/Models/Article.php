<?php

namespace App\Models;


use App\Contracts\HasTagsContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Image;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Contracts\HasImageContract;
class Article extends Model implements HasTagsContract, HasImageContract
{
    use HasFactory;

    protected $fillable = ['title','description','body','published_at', 'slug', 'image_id'];

    public function tags (): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function sync(Model $model, array $tags): void
    {
        $model->tags()->sync($tags);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

}
