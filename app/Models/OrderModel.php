<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderModel extends Model
{
    use HasFactory,SoftDeletes;

 protected $table = 'orders';
    protected $dates = ['deleted_at'];
    protected $fillable = ['product_id','invoice_number','payment_method','total_amount','receipt_url','payment_id','card_id','balance_transaction','order_id','payer_id','number_of_products'];

    public function orderdetail()
      {
        return $this->hasMany('App\Models\OrderDetails', 'order_id','id');
      }
}
