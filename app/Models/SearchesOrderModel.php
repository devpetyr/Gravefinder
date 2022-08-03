<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchesOrderModel extends Model
{
    use HasFactory;
    protected $table = 'searches_order_models';
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id','invoice_number','payment_method','amount','receipt_url','payment_id','card_id','balance_transaction','order_id','payer_id'];

}
