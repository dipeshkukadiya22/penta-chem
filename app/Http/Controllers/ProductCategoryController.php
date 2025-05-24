<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
class ProductCategoryController extends Controller
{
    //
    public function index(){    
        $category=ProductCategory::all();
        return view('Product.productcategory',['category'=>$category]);
        
    }
    public function store(Request $req){
        $data=new ProductCategory();
        $data->category_name=$req->category_name;
        $data->remark=$req->remark;
        $data->save();
        if($data)
        {
            return back()->with('done','Technical Specifications Title Added!');
        }
    }

    public function edit(Request  $req){
       
        $category = ProductCategory::find($req->id);
        
        if($category)
        {
            $category->category_name=$req->edit_category_name;
            $category->remark=$req->edit_remark;

            $category->save();

        }
        return back();
     
    }
    public function getCategory(Request $req)
    {
        $category = ProductCategory::find($req->id);
    
        if ($category) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $category->id,
                    'category_name' => $category->category_name,
                    'remark' => $category->remark,
                ]
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    public function destroy($id){
        $category=ProductCategory::find($id);
        $category->delete();
        return back();
    } 
   
}  
