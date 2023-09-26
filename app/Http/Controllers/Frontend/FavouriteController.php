<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavouriteRequest;
use App\Http\Requests\UpdateFavouriteRequest;
use App\Http\Resources\FavouriteResource;
use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index($user)
    {
//        $favourite = Favourite::with(['users'=> function ($query) {
//            $query->select('users.name');
//        }])->where();/*,'products' => function ($query) {
//        $query->select('products.title');
//    }])->get();*/

//        dd($favourite->users()->where('id',$user));
//        return FavouriteResource::collection($favourite);
//        return $favourite;
//        $users = User::findOrFail($user);
//
//        /*$whitelistProducts = */dd($users->products()->get());
//
//        return response()->json([
//            'whitelistProducts' => $whitelistProducts,
//        ]);


        $user = User::find($user);
        $whitelists = $user->favourite;
        return $whitelists;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFavouriteRequest $request)
    {
        $created = Favourite::create([
            'item' => $request->item,
        ]);
        $productIds = $request->product_ids;
        $userId = Auth::user()->id;
        $created->products()->sync($productIds);
        $created->users()->sync($userId);
        return new FavouriteResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favourite $favourite)
    {
        return new FavouriteResource($favourite);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favourite $favourite)
    {
        $deleted = $favourite->forceDelete();
//        $deleted->products()->detach($productIds);
//        $deleted->users()->sync($userId);
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
