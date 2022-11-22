<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Resources\CustomerAddressResource;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Gate;
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
        $customerAddress = CustomerAddress::find($id);
        if (!Gate::allows('customerAddress', $customerAddress)) {
            return response([
                'message' => 'آیدی وارد شده آیدی آدرس های شما نیست',
                'statusCode' => 403
            ], 403);
        }

        return CustomerAddressResource::make($customerAddress);
    }

    public function update(StoreUserAddressRequest $request, $id)
    {
        $request->validated();

        $customerAddress = CustomerAddress::find($id);
        if (!Gate::allows('customerAddress', $customerAddress)) {
            return response([
                'message' => 'آیدی وارد شده آیدی آدرس های شما نیست',
                'statusCode' => 403
            ], 403);
        }

        $customerAddress->update([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return response([
            'message' => 'با موفقیت تغییر داده شد',
            'statusCode' => 200
        ]);
    }

    public function destroy($id)
    {
        $customerAddress = CustomerAddress::find($id);
        if (!Gate::allows('customerAddress', $customerAddress)) {
            return response([
                'message' => 'آیدی وارد شده آیدی آدرس های شما نیست',
                'statusCode' => 403
            ], 403);
        }

        //200 or 204?
        CustomerAddress::destroy($id);
        return response([
            'message' => 'با موفقیت پاک شد',
            'statusCode' => 200
        ], 200);
    }

    public function currentAddress($id)
    {

        $user_id = auth()->user()->id;

        $customerAddress = CustomerAddress::find($id);
        if (!Gate::allows('customerAddress', $customerAddress)) {
            return response([
                'message' => 'آیدی وارد شده آیدی آدرس های شما نیست',
                'statusCode' => 403
            ], 403);
        }

        $currentAddress = Customer::find($user_id)
            ->update([
                "currentAddress" => $customerAddress
            ]);

        return response([
            'message' => 'آدرس فعلی شما با موفقیت ثبت شد',
            'statusCode' => 200
        ]);
    }
}
