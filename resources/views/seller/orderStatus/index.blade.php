<x-SellerApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __(' وضعیت سفارشات مشتری') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
        <a href="orderStatus/archive/all" class="italic text-xl bold text-pink-600 float-right">
            آرشیو سفارشات &rarr;
        </a>
        <div class="w-5/6 py-10">
            @foreach($orders as $order)
            <div class="m-auto py-6 divide-black">
                <div class="float-left">
                    <a class="pb-2 italic text-green-600" href="orderStatus/{{$order->id}}/edit">ویرایش &rarr;</a>
                </div>
                <div class="flex justify-center space-x-16 font-bold text-xl text-pink-600">

                    <span>
                        وضعیت سفارش: {{ $orderStatus[$order->status]->title }}
                    </span>
                    <span>
                        کد پیگیری: <br>
                        {{$order->trackingCode}}
                    </span>
                    <span>
                        آیدی سفارش: {{$order->id}}
                    </span>
                    <span>
                        آیدی مشتری: {{$order->customer_id}}
                    </span>

                </div>

                <hr class="mt-8 mb-8">
            </div>
            @endforeach
        </div>


    </div>

</x-SellerApp-layout>