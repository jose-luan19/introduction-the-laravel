<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function photos()
    {
        return $this->hasMany(ProductsPhoto::class);
    }
    /* public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    } */
}
