<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TotalSearchesModel extends Model
{
    use HasFactory,SoftDeletes;

     protected $table = 'total_searches_models';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'total_searches','search_left'];
}
