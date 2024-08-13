<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class CatalogController extends Controller
{
    public function index(ProductFilter $filter): JsonResponse
    {

        $products = Product::filter($filter)->paginate(40);
        return response()->json([
            'filters' => $filter->filters(),
            'products'=>$products
        ]);
    }
}
