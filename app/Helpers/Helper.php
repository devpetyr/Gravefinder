<?php

namespace App\Helpers;
use Auth;
use App\Models\BannerModel;
use App\Models\FaqModel;
use App\Models\ProductsModel;
use App\Models\TotalSearchesModel;
use App\Models\RateModel;
use App\Models\StoneRateModel;
use Session;

class Helper
{
   
    public static function bann_img()
    {
        $config = BannerModel::select('images')->where('status',1)->first();
        // dd($config);
        return $config;
    }

      public static function homebann_img()
    {
       
        $config = BannerModel::where('status',1)->where('page_name','home')->get();
        return $config;
    }

     public static function faq_result()
    {
        $config = FaqModel::where('status',1)->get();
        return $config;
    }

     public static function searches_left()
    {   
        $id = Auth::id();
        $config = TotalSearchesModel::select('search_left')->where('user_id',$id)->first();
        return $config;
    }

     public static function rate()
    {   
        $config = RateModel::first();
        return $config;
    }
    public static function stone_rate()
    {   
        $config = StoneRateModel::first();
        return $config;
    }
   
}