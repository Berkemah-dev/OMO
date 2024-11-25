<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Shirt extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'price',
        'stock',
        'is_popular',
        'shirt_id',
        'category_id', //Fk
        'brand_id', //Fk 
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] =($value);
        $this->attributes['slug'] = Str::slug($value);
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function photos(): HasMany
    {
        return $this->hasMany(ShirtPhoto::class, 'shirt_id');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(ShirtSize::class);
    }
}
