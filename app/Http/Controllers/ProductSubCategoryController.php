<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    //
    public function index(){

        $category=ProductCategory::get();

        $productcategory = ProductSubCategory::with('category')->get();

        //dd($productcategory);
        
        return view('Product.productsubcategory', ['category' => $category,'productcategory' => $productcategory]);

    }
    public function store(Request $req)
    {
   
        $data=new ProductSubCategory();
        $data->product_category=$req->category_list;
        $data->subcategory_name=$req->category_name;
        $data->remark=$req->remark;
        $data->save();
        if($data)
       {
        return back()->with('done','Technical Specifications added!');
       }

    }
    public function get(Request $req)
    {
        $category = ProductSubCategory::find($req->id);
        if ($category) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $category->id,
                    'product_category' => $category->product_category,
                    'subcategory_name' => $category->subcategory_name,
                    'remark' => $category->remark,
                ]
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    } 
    public function edit(Request $req)
    {
        $subcategory = ProductSubCategory::findOrFail($req->id);
       
        if($subcategory)
        {
            $subcategory->product_category=$req->edit_category_list;
            $subcategory->subcategory_name=$req->edit_subcategory_name;
            $subcategory->remark=$req->edit_remark;
            $subcategory->save();
        }
        return back();
    }
    public function destroy($id)
    {
        $subcategory = ProductSubCategory::findOrFail($id);
        $subcategory->delete();
        return back();
    }
    
}
