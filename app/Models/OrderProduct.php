<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product ;
class OrderProduct extends Model
{
    use SoftDeletes;
    
    protected $table = "order_products";
    
    protected $fillable = [
        'order_id',
        'product_id',
        'category_id',
        "price",
        "quantity",
        "total",
    ];
 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPrductIdAttribute($value)
    {
        return ucfirst($value);
    }

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
