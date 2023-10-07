<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($product)
    {
        // Retrieve the product
        $product = Product::findOrFail($product);

        // Retrieve the reviews associated with the product
        $reviews = $product->reviews()->with('user')->get();

        // Return the reviews using the ReviewResource
        return ReviewResource::collection($reviews);
    }

}
