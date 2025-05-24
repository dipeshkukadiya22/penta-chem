<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table="product_category";
    protected $primarykey="id";
    public function subcategories()
    {
        return $this->hasMany(ProductSubcategory::class, 'product_category', 'id');
    }
}
