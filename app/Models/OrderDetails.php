<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
     protected $table = 'orders_details';
    protected $dates = ['deleted_at'];
    protected $fillable = ['item','price'
    	 ];

     public function users(){
            return $this->belongsTo('App\Models\OrderModel', 'order_id', 'id');
        }
}
