<x-SellerApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('اطلاعات رستوران') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">


                    <div class="float-right">
                        <a 
                            class="pb-2 italic text-green-600"
                            href="setting/{{$restaurant->id}}/edit">ویرایش &rarr;</a>
                    </div>
                    <div class="text-center flex space-x-32" >
                        <img 
                        src="{{ asset('images/'.$restaurant->restaurantPicture) }}" 
                        class="w-5/12 mb-4 shadow-xl rounded-lg"
                        alt="{{$restaurant->title}}">

                        <div class="text-pink-600 font-bold text-xl mt-32 italic" >
                            <span class="pb-10 mb-10">
                                اسم رستوران: {{$restaurant->name}}
                            </span><br>
                            <span>
                                نام صاحب رستوران: {{auth()->user()->name}}
                            </span><br>
                            <span>
                                شماره ی تماس: {{$restaurant->phone}}
                            </span><br>
                            <span>
                                آدرس: {{$restaurant->address}} 
                            </span><br>
                            <span>
                                شماره ی حساب: {{$restaurant->accountNumber}} 
                            </span><br>
                            <span>
                                دسته بندی رستوران: {{$restaurant->categories}} 
                            </span><br>
                            <span>
                                هزینه ی ارسال: {{$restaurant->shippingCost}} 
                                @if(empty($restaurant->shippingCost)) 
                                    تعیین نشده
                                @endif
                            </span><br>
                            <span>
                                 ساعت کاری : <br>{{$restaurant->workingDay}} 
                                 
                                @if(empty($restaurant->workingDay)) 
                                    تعیین نشده
                                @endif                            
                            </span><br>
                            
                            <span>
                                وضع رستوران: 
                                @if($restaurant->status)
                                    باز
                                @else   
                                    بسته
                                @endif
                            </span><br>
                        </div>

                    </div>

    </div>
    
</x-SellerApp-layout>