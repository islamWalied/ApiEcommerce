<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();
        return ProfileResource::collection($users);
    }
    public function update(UpdateProfileRequest $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $image = $user->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('users', 'public');
        }
        $user->update([
            'name' => $request->name ?? $user->name,
            'address' => $request->address ?? $user->address,
            'phone' => $request->phone ?? $user->phone,
            'image' =>  $image,
        ]);

        return response()->json($user);
    }
}
