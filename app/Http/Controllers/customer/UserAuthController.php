<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\UserAuthRequest;
use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(UserAuthRequest $request)
    {   
        $request->validated();

        $user = Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('name')),
        ]);
    }
}
