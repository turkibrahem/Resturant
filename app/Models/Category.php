<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    use Translatable;
    use SoftDeletes;
    
    public $translationModel = 'App\Models\CategoryTranslation';
    protected $table = 'categories';

    public $translatedAttributes = ['name'];
    protected $appends = ['name'];
    protected $hidden = ['translations'];
    protected $fillable = ['active'];

    public function getNameAttribute()
    {
        return $this->getTranslationByLocaleKey(app()->getLocale())->name;
    }

    public function products() {
        return $this->hasMany(Product::class);      
    }   
}
