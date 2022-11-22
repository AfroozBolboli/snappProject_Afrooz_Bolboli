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
            return response('آیدی وارد شده آیدی آدرس های شما نیست', 401);
        }

        return CustomerAddressResource::make($customerAddress);
    }

    public function update(StoreUserAddressRequest $request, $id)
    {
        $request->validated();

        $customerAddress = CustomerAddress::find($id);
        if (!Gate::allows('customerAddress', $customerAddress)) {
            return response('آیدی وارد شده آیدی آدرس های شما نیست', 401);
        }

        $customerAddress->update([
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        return response('با موفقیت تغییر داده شد', 200);
    }

    public function destroy($id)
    {
        $customerAddress = CustomerAddress::find($id);
        if (!Gate::allows('customerAddress', $customerAddress)) {
            return response('آیدی وارد شده آیدی آدرس های شما نیست', 401);
        }
        
        //200 or 204?
        CustomerAddress::destroy($id);
        return response('با موفقیت پاک شد', 200);
    }

    public function currentAddress($id)
    {

        $user_id = auth()->user()->id;

        $customerAddress = CustomerAddress::find($id);
        if (!Gate::allows('customerAddress', $customerAddress)) {
            return response('آیدی وارد شده آیدی آدرس های شما نیست', 401);
        }

        $currentAddress = Customer::find($user_id)
            ->update([
                "currentAddress" => $customerAddress
            ]);

        return response('آدرس فعلی شما با موفقیت ثبت شد',200);
        // return CustomerAddressResource::collection(Customer::find($user_id)->currentAddress);
    }
}
