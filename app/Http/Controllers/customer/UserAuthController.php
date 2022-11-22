<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\UserAuthRequest;
use App\Http\Requests\customer\UserLoginRequest;
use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function register(UserAuthRequest $request)
    {
        $request->validated();

        $user = Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
        ]);

        $token = $user->createToken('User token')->plainTextToken;

        $response = [
            'customer' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(UserLoginRequest $request)
    {
        $request->validated();

        //Check email
        $customer = Customer::where('email', $request->email)->first();

        //Check Password
        if (!$customer && !Hash::check($request->password, $customer->password)) {
            return response(' اطلاعات وارد شده اشتباه می باشد میباشد', 401);
        }

        $token = $customer->createToken('User token')->plainTextToken;

        $response = [
            'customer' => $customer,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens->each->delete();

        return response([
            'message' => 'شما با موفقیت خارج شدید',
            'statusCode' => 201
        ], 201);
    }
}
