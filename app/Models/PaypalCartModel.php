<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaypalCartModel extends Model
{
    use HasFactory,SoftDeletes;
     protected $table = 'paypal_cart_models';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	 'order_id','payment_id'];
}
