<?php

use app\Models\ProductCategory;
use app\Models\ProductSubCategory;
use Illuminate\Support\Facades\DB;


if (!function_exists('getSpecificationtitle')) {

    function getSpecificationtitle($id)
    {

        $getdetail = ProductCategory::where('id',$id)->first();
        if($getdetail)
        {
            return $getdetail->category_name;
        }
        else
        {
            return '';
        }

    }
  
}

if (!function_exists('getSpecification')) {

    function getSpecification($id)
    {

        $getdetail = ProductSubCategory::where('id',$id)->first();
        if($getdetail)
        {
            return $getdetail->subcategory_name;
        }
        else
        {
            return '';
        }

    }
  
}

if(!function_exists('getPropertytitles')){

    function getPropertytitles($id)
    {
        //dd($id);
        $getdetail =DB::table('product_category')->where('id',$id)->first();
        if($getdetail)
        {
            return $getdetail->category_name;
        }
        else
        {
            return '';
        }
    }

}

if(!function_exists('getPropertyvalue')){

    function getPropertytitle($id)
    {
        $getdetail = DB::table('product_subcategory')->where('id', $id)->first();
        //dd($getdetail);

        if($getdetail)
        {
            return $getdetail->subcategory_name;
        }
        else
        {
            return '';
        }
    }

}