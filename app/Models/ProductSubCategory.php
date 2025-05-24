<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductSubCategory extends Model  
{
    use HasFactory;
    protected $table="product_subcategory";
    protected $primarykey="id";

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category', 'id');
    }
}
