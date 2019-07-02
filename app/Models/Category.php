<?php

namespace App\Models;

use App\Events\NameSaving;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    protected $dispatchesEvents = [
        'saving' => NameSaving::class,
    ];

    public function images()
    {
        return $this->belongsTo(Image::class);
    }
}
