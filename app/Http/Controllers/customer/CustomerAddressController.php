<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Resources\CustomerAddressResource;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;

class CustomerAddressController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        return 
        CustomerAddressResource::collection(CustomerAddress::where('user_id', $user)->get());
    }

    public function store(StoreUserAddressRequest $request)
    {
        $request->validated();

        $address = CustomerAddress::create([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'user_id' => auth()->user()->id
        ]);

        return $address;
    }

    public function show($id)
    {
        $user = auth()->user()->id;
        $address = CustomerAddress::where('user_id', $user)
            ->find($id)
            ->get();

        return CustomerAddressResource::collection($address);
    }

    public function update(StoreUserAddressRequest $request, $id)
    {
        $request->validated();

        $user_id = auth()->user()->id;
        $address = CustomerAddress::where('user_id', $user_id)
            ->get()
            ->find($id);

        $address->update([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return 'با موفقیت تغییر داده شد';
    }

    public function destroy($id)
    {
        CustomerAddress::destroy($id);
        return 'با موفقیت پاک شد';
    }
}
