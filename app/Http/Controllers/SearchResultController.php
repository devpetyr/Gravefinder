<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchResultController extends Controller
{
  public function details($id)
  {
     $data = DB::table('grave_product')->where('PersonID',$id)->get();
     return view('details')->with(compact('data'));
  }
}
