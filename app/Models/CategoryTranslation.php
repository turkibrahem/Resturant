<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    
    public $timestamps = false;
    protected $table = 'categories_translations';
    protected $fillable = ['category_id', 'name', 'locale'];
    
}