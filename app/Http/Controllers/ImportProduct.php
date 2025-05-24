<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;

class ImportProduct extends Controller
{
    public function showImportForm()
    {
        return view('Product.import');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new ProductImport, $request->file('file'));

        dd('Products are imported');
    }
}
