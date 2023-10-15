<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        // Send verification email
        $user->notify(new VerifyEmailNotification());

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,
            201,
            [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
            ]);
    }


    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response(
            $response,
            201,
            [
                'Accept' => 'application/json',
                'content-type' => 'application/json',
                "ngrok-skip-browser-warning" => "69420",
            ]);
    }


    public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleProviderCallback(): \Illuminate\Http\JsonResponse
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('social_id', $user->id)->first();
            if ($finduser)
            {
                Auth::login($finduser);
                $token = $finduser->createToken('myapptoken')->plainTextToken;
                return response()->json([$finduser,$token]);
            }
            else
            {
                $newuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => Hash::make($user->password),
                ]);
                Auth::login($newuser);
                $token = $newuser->createToken('myapptoken')->plainTextToken;
                return response()->json([$newuser,$token]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }


//        $userCreated = User::firstOrCreate(
//            [
//                'email' => $user->getEmail()
//            ],
//            [
//                'email_verified_at' => now(),
//                'name' => $user->getName(),
//                'status' => true,
//            ]
//        );
//        $userCreated->providers()->updateOrCreate(
//            [
//                'provider' => 'google',
//                'provider_id' => $user->getId(),
//            ],
//            [
//                'avatar' => $user->getAvatar()
//            ]
//        );
//        $token = $userCreated->createToken('token-name')->plainTextToken;


        return response()->json($userCreated, 200, ['Access-Token' => $token]);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

}
