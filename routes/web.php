<?php

use App\Http\Controllers\dashboard;
use App\Http\Controllers\ImportProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSubCategoryController;
use App\Livewire\Counter;
use App\Http\Controllers\login;
use App\Http\Controllers\product;
use App\Http\Controllers\usercontroller;
use App\Livewire\AboutUS;
use App\Livewire\ContactUs;
use App\Livewire\Homepage;
use App\Livewire\Internationalpage;
use App\Livewire\Productinside;
use App\Livewire\Productpage;

Route::get('/testing',[product::class,'test']);

Route::group(['middleware' => ['onlyAdmin']], function(){
    Route::get('/addadmin',[login::class,'addadmin'])->name('addadmin');
    Route::get('/admin/dashboard',[dashboard::class,'index'])->name('dashboard');
    Route::get('admin/allusers',[usercontroller::class,'index'])->name('users');
    Route::post('/admin/adduser',[usercontroller::class,'addUser'])->name('adduser');
    Route::post('/admin/allusers/edit', [usercontroller::class, 'edit'])->name('user.edit');
    Route::get('/admin/allusers/get', [usercontroller::class, 'get'])->name('user.get');
    Route::get('/admin/allusers/destroy/{id}', [usercontroller::class, 'destroy'])->name('user.destroy');
    
    Route::get('admin/addproduct',[product::class,'index'])->name('addproduct');
    Route::post('addproductsdb',[product::class,'addproduct'])->name('addproducts');
    Route::get('admin/viewallproducts',[product::class,'viewallproducts'])->name('viewallproducts');
    Route::get('admin/viewallproducts/destroy/{id}', [Product::class, 'destroy'])->name('product.destroy');
    Route::get('admin/viewproduct/{id}',[product::class,'viewsingleproduct'])->name('viewsingleproduct');
    Route::get('admin/editproduct/{id}',[product::class,'edit'])->name('editproduct');
    Route::post('admin/update',[product::class,'update'])->name('product.update');
    Route::get('/counter', Counter::class);
    
    
    Route::get('/product',[ProductController::class,'index']);
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/get', [Product::class, 'get'])->name('product.get');
    Route::post('/product/edit', [Product::class, 'edit'])->name('product.edit');
    
    
    Route::get('/admin/productcategory',[ProductCategoryController::class,'index'])->name('technicalspectitle');
    Route::post('/productcategory/store', [ProductCategoryController::class, 'store'])->name('productcategory.store');
    Route::post('/productcategory/edit', [ProductCategoryController::class, 'edit'])->name('productcategory.edit');
    Route::get('/productsubcategory/get', [ProductSubCategoryController::class, 'get'])->name('productsubcategory.get');
    Route::get('/productsubcategory/destroy/{id}', [ProductSubCategoryController::class, 'destroy'])->name('productsubcategory.destroy');
    
    
    
    Route::get('admin/productsubcategory',[ProductSubCategoryController::class,'index'])->name('technicalspec');
    Route::post('/store',[ProductSubCategoryController::class,'store'])->name('productsubcategory.store');
    Route::post('/productsubcategory/edit',[ProductSubCategoryController::class,'edit'])->name('productsubcategory.edit');
    Route::post('/productsubcategory/destroy/{id}',[ProductSubCategoryController::class,'destroy'])->name('productsubcategory.destroy');
    
    Route::get('/productcategory/get', [ProductCategoryController::class, 'getCategory'])->name('productcategory.get');
    Route::get('/productcategory/destroy/{id}', [ProductCategoryController::class, 'destroy'])->name('productcategory.destroy');
    
    Route::get('admin/downloadpdf',[product::class,'downloadpdfdata'])->name('downloadpdfdata');
    
});

Route::get('/cockpit',[login::class,'loginview'])->name('cockpit');
Route::post('/loginattempt',[login::class,'authlogin'])->name('authlogin');
Route::get('/loginattempt',[login::class,'destroy'])->name('destroy');

//front end routes

Route::get('/',Homepage::class)->name('homepage');
Route::get('/products',Productpage::class)->name('productpage');
Route::get('/products/{id}',Productinside::class)->name('productinside');
Route::get('/aboutus',AboutUS::class)->name('aboutus');
Route::get('/international',Internationalpage::class)->name('international');
Route::get('/contactus',ContactUs::class)->name('contactus');

//Import routes

Route::get('/imports', [ImportProduct::class, 'showImportForm'])->name('products.import.form');
Route::post('/products/import', [ImportProduct::class, 'import'])->name('products.import');