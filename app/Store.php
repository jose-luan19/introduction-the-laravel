<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['name','description','phone','mobile_phone','slug','logo'];
    //protected $table = 'tb_store'; //Atributo para informar a ORM qual o nome da tabela no meu DB

    use HasSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('slug');
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
