<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eleqouent ;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;

class Product extends Eleqouent 
{
    use SoftDeletes;
    use Translatable;
    
    public $table="products" ;
    protected $appends = ['name', 'description'];

    public $translatedAttributes = [
        'name',
        "description"
    ];

    protected $hidden = ['translations'];
    
    protected $fillable = [
        "category_id",
        "price",
        "image",
        "active",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getNameAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->name;
    }
    public function getDescriptionAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->description;
    }

}
