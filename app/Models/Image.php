<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Storage;

class Image extends Model
{
    use HasFactory;

    public const STORAGE_DISK = 'public';

    public const PATH_PREFIX = 'images';

    protected $fillable = [
        'path',
    ];

    public function url(): Attribute
    {
        return Attribute::get(fn() => $this->path ?
            Storage::disk(self::STORAGE_DISK)->url($this->path) : null);
    }
}
