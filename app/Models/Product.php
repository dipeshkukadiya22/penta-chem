<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table="products";
    protected $primarykey="id";

    protected $fillable = [
        'product_name',
        'slug',
        'technical_specification',
        'producttype',
        'manufacturer',
        'storageandlife',
        'competitor',
    ];
    
}
