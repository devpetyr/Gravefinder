<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGModel extends Model
{
    use HasFactory;
     protected $table = 'grave_product';
     protected $primaryKey = 'PersonID';
}
