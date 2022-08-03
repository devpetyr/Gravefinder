<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StripeModel extends Model
{
    use HasFactory,SoftDeletes;
      protected $table = 'stripe_models';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	 'card_id','balance_transaction','payment_method','receipt_url','card_last_four','all_data'];
}
