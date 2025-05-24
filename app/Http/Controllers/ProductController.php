<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        
        $subcategories = ProductSubCategory::with('category')
            ->orderBy('product_category', 'asc') // Sort by product_category in ascending order
            ->get();
        $products=Product::all();

        $count = Product::latest()->first();
        if ($count == null) {
            $productcode = "AAC001";
        } else {
            $lastProductCode = $count->product_code;
    
            preg_match('/\d+/', $lastProductCode, $matches);
            $lastNumber = $matches[0];
    
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    
            $productcode = "AAC" . $newNumber;
        }
 
        return view('Product.product', ['subcategories' => $subcategories,'products'=>$products,'productcode'=>$productcode]);
    }
    public function store(Request $req)
    {
        $data = [];
    
        $groupedCategories = $req->except('_token'); // Exclude the CSRF token from the form data

        foreach ($groupedCategories as $key => $value) {
      
            $key = str_replace('_', ' ', $key);
    
            $category = ProductSubCategory::where('subcategory_name', $key)->first();
        
            if ($category) {
             
                $data[$category->category_name][$key] = $value;

            }
        }
 
        // Convert the data array to JSON format
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    
        // Get the last product code and generate the next one
        $count = Product::latest()->first();
        if ($count == null) {
            $productcode = "AAC001";
        } else {
            
            $lastProductCode = $count->product_code;
    
            preg_match('/\d+/', $lastProductCode, $matches);
            $lastNumber = $matches[0];
    
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    
            $productcode = "AAC" . $newNumber;
        }
    
        $product = new Product();
        $product->product_name = $req->product_name; // Replace with actual product name
        $product->product_code = $req->product_code;
        $product->technical_specification = $jsonData;  // Store the JSON data in the 'subcategories' column
        $product->save();  // Save the product to the database
    
        // Debugging - Check if the data is saved successfully
        return back();
    }
}    