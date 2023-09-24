<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['sizes' => function ($query) {
            $query->select('sizes.size');
        }, 'colors' => function ($query) {
            $query->select('colors.color');
        }, 'images'])->get();
        return $products;
    }
    public function show(Product $product)
    {
        $products = Product::with(['sizes' => function ($query) {
            $query->select('sizes.size');
        }, 'colors' => function ($query) {
            $query->select('colors.color');
        }, 'images'])->find($product->id);

        return $products;
    }
    public function filterByCategory(Request $request)
    {
        // Retrieve the category query parameter
        $category = $request->query('category');

        // Filter products by category if provided
        if ($category) {
            $products = Product::whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            })->get();
        } else {
            // Retrieve all products if no category is provided
            $products = Product::all();
        }
        return ProductResource::collection($products);


    }
}
