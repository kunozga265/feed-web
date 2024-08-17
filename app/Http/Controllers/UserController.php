<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            "email"         => ['required'],
            "password"      => ['required'],
            'device_name'   => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $token=$user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'user'  =>  new UserResource($user),
            'token' =>  $token
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            "first_name"     => ['required','string', 'max:255'],
            "last_name"      => ['required','string', 'max:255'],
            "email"         => ['required','unique:users','email','string'],
            "password"      => ['required', 'confirmed', new Password, 'string'],
            'phone_number'  => ['required', 'unique:users'],
            'device_name'   => ['required'],
            'role_id'       => ['required'],
        ]);

        $user=User::create([
            "first_name"     => ucwords($request->first_name),
            "middle_name"    => ucwords($request->middle_name),
            "last_name"      => ucwords($request->last_name),
            "email"         => $request->email,
            "phone_number"  => $request->phone_number,
            "password"      => bcrypt($request->password),
        ]);

        $user->roles()->attach((new AppController())->getRole($request->role_id));

        //Unnecessary to inform everyone I think
        /*Notification::create([
            'type'      => 'NEW_USER',
            'message'   => $user->first_name." ". $user->last_name . " has been added to the system.",
        ]);

        (new AppController())->pushNotification("Site Removed", $message);*/

        $token=$user->createToken($request->device_name)->plainTextToken;
        //Email new user with credentials

        return response()->json([
            'user'  =>  new UserResource($user),
            'token' =>  $token
        ]);
    }
}
