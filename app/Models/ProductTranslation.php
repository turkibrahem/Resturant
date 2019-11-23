<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTranslation extends Model
{

    public $table="products_translations" ;

    public $timestamps = false;

    public $fillable = [
        'product_id',
        'locale',
        'name',
        "description"
    ];
}
