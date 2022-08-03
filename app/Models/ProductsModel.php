<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsModel extends Model
{
    use HasFactory,SoftDeletes;
    protected $table= 'grave_product';
    protected $dates = ['deleted_at'];
}
