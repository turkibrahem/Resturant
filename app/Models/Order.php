<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    protected $table = 'orders';
    
    protected $fillable = ['phone', 'lat', 'long', 'address','status','total_price'];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::Class);
    }
   
}
