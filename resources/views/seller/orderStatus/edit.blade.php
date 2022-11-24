<x-SellerApp-layout>
    <div class="m-auto w-4/8 py-24">
        <x-slot name="header">
            <h2 class="text-3xl bold text-white leading-tight text-center">
                {{ __(' تغییر وضعیت سفارشات مشتری ') }}
            </h2>
        </x-slot>

        <div class="text-center pt-20 font-bold text-xl text-pink-600">
            <form action="/seller/orderStatus/{{$order->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <span >
                    آیدی سفارش: {{$order->id}}
                </span><br>
                <span>
                    آیدی مشتری: {{$order->customer_id}}
                </span> <br>
                <select name="status" class="my-5">
                    @foreach($orderStatus as $status)
                    <option value="{{$status->status}}"> {{ $status->title }}</option>
                    @endforeach
                </select>

                <div class="flex justify-center">
                    <button type="submit" class="bg-pink-500 block shadow-5xl my-5 p-2 w-80 font-bold text-white">
                        ثبت
                    </button>
                </div>

        </div>
        </form>
    </div>
    @if ($errors->any())
    <div class="w-4/8 m-auto text-center">
        @foreach($errors->all() as $error)
        <li class="text-red-500 list-none">
            {{$error}}
        </li>
        @endforeach
    </div>
    @endif
    </div>
</x-SellerApp-layout>