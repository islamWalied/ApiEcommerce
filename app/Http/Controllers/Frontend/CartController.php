<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::all();
        return CartResource::collection($cart);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $user = Auth::user()->id;
        $created = Cart::create([
            'user_id' => $user,
            'quantity' => "0",
        ]);
        $productIds = $request->product_ids;
        $created->products()->sync($productIds);
        return new CartResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return new CartResource($cart);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $user = Auth::user()->id;
        $updated = $cart->update([
            'user_id' => $user,
            'quantity' =>$request->quantity,
        ]);
        if (!$updated)
        {
            return new JsonResponse([
               'errors' => 'failed to update the product'
            ]);
        }
        $productIds = $request->product_ids;
        $cart->products()->sync($productIds);
        return new CartResource($cart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $deleted = $cart->forceDelete();
        if (!$deleted)
        {
            return new JsonResponse([
                'errors' => 'failed to delete the product'
            ]);
        }
        return new JsonResponse([
            'message' => 'the product is deleted successfully'
        ]);
    }
}
