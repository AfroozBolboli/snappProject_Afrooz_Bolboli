<x-SellerApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __(' گزارشات') }}
        </h2>
    </x-slot>

    <div class="m-auto w-11/12 py-6">
        <div class="flex justify-center">
            <form action="{{url('seller/reports/filter')}}" method="post">
                @csrf
                <div class=" m-8 mx-auto form-control text-right">
                    <label>فیلتر</label><br>
                    <select name="reportFilter" class="text-right my-1">
                        <option value="week">براساس هفته</option>
                        <option value="month">بر اساس ماه</option>
                    </select>
                    <button type="submit" class="bg-gray-800 block mx-auto shadow-5xl mb-10 p-1 w-3/4 font-bold text-white">
                        جست و جو
                    </button>
                </div>
            </form>
        </div>
        <div class="w-11/12 py-5">
            @if($orders != null)
            <div class="flex justify-center space-x-16 text-pink-600">
                <h3 class="text-center text-3xl font-bold mb-16"> درآمد کل مجموعه:
                    {{$totalIncome}}
                </h3>
                <h3 class="text-center text-3xl font-bold mb-16"> درآمد کل مجموعه:
                    {{$totalOrders}}
                </h3>

            </div>
            @foreach($orders as $order)
            <div class=" py-6 divide-black">

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
            @else
                <h3 class="text-center text-3xl font-bold mb-16"> 
                    سفارشی یافت نشد
                </h3>
            @endif
        </div>


    </div>

</x-SellerApp-layout>