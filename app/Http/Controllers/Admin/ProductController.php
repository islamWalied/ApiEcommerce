<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ProductResource;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return ProductResource::collection($product);
//        $joined = DB::table('products')
//            ->join('images', 'images.product_id', '=', 'products.id')
//            ->select('products.*','images.image_url')
//            ->get();
//        return $joined;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);

        if ($request->has('image_url'))
        {
            $image = $request->file('image_url');

            foreach ($image as $imagefile){
//                $name = time() . $key . "." . $value->getClientOriginalExtension();
//                $path = public_path('storage/products');
//                $value->move($path,$name);
                $image_path = $imagefile->store('products', 'public');
                $imageValidator = Validator::make(['image_url' => $imagefile, 'product_id' => $product->id], [
                    'image_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'product_id' => 'required|numeric'
                ]);
                if ($imageValidator->fails()) {
                    return response()->json(['error' => $imageValidator->errors()], 400);
                }

                Image::create([
                    'image_url' => $image_path,
                    'product_id' => $product->id,
                    'is_primary' => $request->is_primary,
                ]);
            }
        }

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $joined = DB::table('products')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->select('products.*','images.image_url','images.product_id','images.is_primary')
            ->where('images.product_id' , '=', $product->id)
            ->get();
        return $joined;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
//        $joined = DB::table('products')
//            ->join('images', 'images.product_id', '=', 'products.id')
//            ->select('products.*','images.image_url')
//            ->where('images.product_id' , '=', $product->id)
//            ->get();

        $updated = $product->update([
            'title' => $request->title ?? $product->title,
            'description' => $request->description ?? $product->description,
            'price' => $request->price ?? $product->price,
            'discount_price' => $request->discount_price ?? $product->discount_price,
            'quantity' => $request->quantity ?? $product->quantity,
            'category_id' => $request->category_id ?? $product->category_id,
        ]);


        if (!$updated){
            return new JsonResponse([
               'error' => 'failed to update the product'
            ],400);
        }
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the associated images
        $images = $product->images;

        foreach ($images as $image) {

            // Delete the image file from storage
            Storage::delete($image->image_url);

            // Delete the image record from the database
            $image->delete();
        }

        // Delete the product itself
        $deleted = $product->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the product'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The product is deleted successfully'
        ]);
    }
}
