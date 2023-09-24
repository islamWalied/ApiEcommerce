<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $image = null;
//        if ($request->hasFile('image')) {
//            $image = $request->file('image')->store('users', 'public');
//        }
//
//        $created = User::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'phone' => $request->phone,
//            'address' => $request->address,
//            'password' => bcrypt($request->password),
//            'image' => $image,
//        ]);
//
//        return new UserResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
//        $request->validate([
//            'name' => 'string',
//            'email' => 'unique:users,email,'.$user->id,
//            'phone' => 'numeric',
//            'address' => 'string',
//            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
//        ]);
//        $image = $user->image;
//        if ($request->hasFile('image'))
//        {
//            Storage::delete($user->image);
//            $image = $request->file('image')->store('users','public');
//        }
//        $updated = $user->update([
//            'name' => $request->name ?? $user->name,
//            //TODO
//            //adjust email to take the old email and not changing it when updating
//
//            'email' => $request->email,
//            'phone' => $request->phone ?? $user->phone,
//            'address' => $request->address ?? $user->address,
//            'password' => bcrypt($request->password) ?? $user->password,
//            'image' => $image
//        ]);
//        if (!$updated){
//            return new JsonResponse([
//                'errors' => 'failed to update the user'
//            ]);
//        }
//        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
//        if($user->image != null){
//            Storage::delete($user->image);
//        }
//        $deleted = $user->forceDelete();
//        if (!$deleted){
//            return new JsonResponse([
//                'errors' => 'failed to delete the user'
//            ]);
//        }
//        return new JsonResponse([
//            'errors' => 'the user is deleted successfully'
//        ]);
    }
}
