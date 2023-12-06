<?php

namespace App\Models;

use App\Contracts\HasImageContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Car extends Model implements HasImageContract
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'old_price', 'engine_id', 'body_id', 'class_id', 'salon', 'kpp', 'year', 'color', 'is_new', 'body_text', 'image_id'];

    protected $appends = ['car_engine', 'car_body', 'car_class'];
    public function engine()
    {
        return $this->belongsTo(CarEngine::class);
    }

    public function body()
    {
        return $this->belongsTo(CarBody::class);
    }

    public function class ()
    {
        return $this->belongsTo(CarClass::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getCarEngineAttribute(): ?string
    {
        if ($this->engine == null) {
            return null;
        }
        return $this->engine->name;
    }

    public function getCarBodyAttribute(): ?string
    {
        if ($this->body == null) {
            return null;
        }
        return $this->body->name;
    }

    public function getCarClassAttribute(): ?string
    {
        if ($this->class == null) {
            return null;
        }
        return $this->class->name;
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(fn() => $this->image?->url ?:
            '/assets/images/no-image.png');
    }

    public function getImagesUrlsAttribute(): array
    {
        return $this->images()->get()->map(fn(Image $image) => $image->url)->toArray();
    }

    public function getImageUrlAttribute(): string
    {
        return $this->image->url;
    }


}
