<?php

namespace App\Http\Controllers;

use App\Models\pdfdownload;
use App\Models\Product as ModelsProduct;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class product extends Controller
{
    public function index(){
        $subcategories = ProductSubCategory::with('category')
        ->orderBy('product_category', 'asc') // Sort by product_category in ascending order
        ->get();
        //dd($subcategories);
        return view('Product.addproduct',['subcategories'=>$subcategories]);
    }

    public function addproduct(Request $req){
    
        // Validate required fields
    $validatedData = $req->validate([
        'categories' => 'required|array',
        'producttype' => 'required|string',
        'manufacturer' => 'required|string',
        'Storage' => 'nullable|string',
    ]);

    $adddata = new ModelsProduct();
    $adddata->technical_specification = json_encode($validatedData['categories']);
    $adddata->product_name = $req->pname;
    $adddata->slug = str_replace(' ', '-', strtolower($req->pname));
    $adddata->producttype = $validatedData['producttype'];
    $adddata->manufacturer = $validatedData['manufacturer'];
    $adddata->storageandlife = $validatedData['Storage'];
    $adddata->competitor = $req->Competitor;
    $adddata->save();

    return redirect()->back()->with('done', 'Product saved successfully!');

    }


    public function viewallproducts(){
        $allproducts = ModelsProduct::all();

        $subcategories = ProductSubCategory::with('category')
        ->orderBy('product_category', 'asc') // Sort by product_category in ascending order
        ->get();
       return view('Product.allproduct',['data'=>$allproducts,'subcategories'=> $subcategories]);
    }

    public function viewsingleproduct($id)
    {
        $product = ModelsProduct::find($id);
        $categories = json_decode($product->technical_specification, true);
        //dd($categories);
        return view('Product.singleproduct',['product'=>$product,'technical'=>$categories]);
 
    }
    public function get(Request $req)
    { 
        $product = ModelsProduct::find($req->id);
        if ($product) {

            $groupedCategories = json_decode($product->technical_specification, true);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $product->id,
                    'product_name' => $product->product_name,
                    'producttype' => $product->producttype,
                    'manufacturer' => $product->manufacturer,
                    'competitor' => $product->competitor,
                    'storageandlife' => $product->storageandlife,
                    // 'technical_specification' => $product->technical_specification,
                    'technical_specification' => $groupedCategories,
                ]
                
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    public function edit($id)
    {
        $subcategories = ProductSubCategory::with('category')
        ->orderBy('product_category', 'asc') // Sort by product_category in ascending order
        ->get();

        $product = ModelsProduct::findOrFail($id);
        $groupedCategories = json_decode($product->technical_specification, true);
        $technicalspecification=json_decode($product->technical_specification, true) ?? [];

        return view('Product.editproduct',['subcategories'=>$subcategories,'product' => $product,'technicalspecification' => $technicalspecification]);
    }
    public function update(Request $req)
    {
    
        $validatedData = $req->validate([
            'categories' => 'required|array',
            'producttype' => 'required|string',
            'manufacturer' => 'required|string',
            'Storage' => 'nullable|string',
        ]);

        $adddata = ModelsProduct::findOrFail($req->pid);
      
        $adddata->technical_specification = json_encode($validatedData['categories']);
        $adddata->product_name = $req->pname;
        $adddata->producttype = $validatedData['producttype'];
        $adddata->manufacturer = $validatedData['manufacturer'];
        $adddata->storageandlife = $validatedData['Storage'];
        $adddata->competitor = $req->Competitor;
        $adddata->save();

        $allproducts = ModelsProduct::all();

        $subcategories = ProductSubCategory::with('category')
        ->orderBy('product_category', 'asc') // Sort by product_category in ascending order
        ->get();
       return view('Product.allproduct',['data'=>$allproducts,'subcategories'=> $subcategories]);
    }
    public function destroy($id)
    {
        $product = ModelsProduct::findOrFail($id);
        $product->delete();

        return back();
    }

    public function test(){
        $product = ModelsProduct::where('slug', '4-ethylguaiacol')->first();
        if (!$product) {
            abort(404, 'Product not found');
        }

        $categories = json_decode($product->technical_specification, true);
        $pdf = Pdf::loadView('pdf.productiinfo',[
            'product' => $product,
            'technical_raw' => $categories,
            'title'=>'4-ETHYLGUAIACOL'
        ]);
        return $pdf->stream();
    }

    public function downloadpdfdata(){
        $alldata = pdfdownload::orderBy('id', 'desc')->get();
        return view('admin.downloaddata',['data'=>$alldata]);
    }
}
