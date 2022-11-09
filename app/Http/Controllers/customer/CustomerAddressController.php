<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use illuminate\Database\Eloquent\SoftDeletes;


class CustomerAddressController extends Controller
{
    public function index()
    {
        return UserAddress::all();
        return 'meow';
    }

    public function store(StoreUserAddressRequest $request)
    {
        $request->validated();

        $address = UserAddress::create([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return $address;
    }

    public function show($id)
    {
        return UserAddress::find($id);
    }

    public function update(StoreUserAddressRequest $request, $id)
    {
        $address = UserAddress::find($id);
        $address->update([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return 'با موفقیت تغییر داده شد';
    }
    //use SoftDeletes;

    public function destroy($id)
    {
        return UserAddress::find($id)->delete();
    }
}
