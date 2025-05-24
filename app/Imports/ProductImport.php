<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Skip the header
        $headerSkipped = false;
        
        DB::beginTransaction();
        try {
            foreach ($rows as $row) {
                if (!$headerSkipped) {
                    $headerSkipped = true;
                    continue;
                }

                $productName = trim($row[0]);
                $slug = Str::slug($productName);

                $technicalSpecificationJson = $row[1];

                // 🛠 Fix double-encoded JSON
                $technicalSpecificationJson = trim($technicalSpecificationJson, '"');
                $technicalSpecificationJson = str_replace('\"', '"', $technicalSpecificationJson);

                // Decode safely
                $technicalSpecificationArr = json_decode($technicalSpecificationJson, true);

                $mappedSpecification = [];

                if (is_array($technicalSpecificationArr)) {
                    foreach ($technicalSpecificationArr as $categoryName => $specs) {
                        // Lookup the category
                        $category = ProductCategory::where('category_name', $categoryName)->first();
                        if (!$category) {
                            // Optional: skip if category not found
                            continue;
                            // or: throw new \Exception("Category '$categoryName' not found.");
                        }

                        $categoryId = $category->id;

                        if (is_array($specs)) {
                            foreach ($specs as $subCategoryName => $value) {
                                // Lookup the subcategory
                                $subcategory = ProductSubcategory::where('subcategory_name', $subCategoryName)
                                    ->where('product_category', $categoryId)
                                    ->first();

                                if (!$subcategory) {
                                    // Optional: skip if subcategory not found
                                    continue;
                                    // or: throw new \Exception("Subcategory '$subCategoryName' under '$categoryName' not found.");
                                }

                                $mappedSpecification[$categoryId][$subcategory->id] = $value;
                            }
                        }
                    }
                }

                // Finally, create the product
                Product::create([
                    'product_name' => $productName,
                    'slug' => $slug,
                    'technical_specification' => json_encode($mappedSpecification),
                    'producttype' => $row[2],
                    'manufacturer' => $row[3],
                    'storageandlife' => $row[4],
                    'competitor' => $row[5],
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // You can log $e->getMessage() if you want to check the error
        }
    }
}