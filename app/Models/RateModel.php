<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RateModel extends Model
{
    use HasFactory,SoftDeletes;

     protected $table = 'rate_models';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'rate'];
}
