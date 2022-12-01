<x-SellerApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('اطلاعات رستوران') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">


        <div class="float-right">
            <a class="pb-2 italic text-green-600" href="setting/{{$restaurant->id}}/edit">ویرایش &rarr;</a>
        </div>
        <div class="text-center flex space-x-32 ">
            <img src="{{ asset('storage/restaurantPicture/'.$restaurant->restaurantPicture) }}" class="w-5/12 mb-4 shadow-xl rounded-lg" alt="{{$restaurant->title}}">

            <div class="text-pink-600 font-bold text-xl mt-5 italic">
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
                    وضع رستوران:
                    @if($restaurant->status)
                    باز
                    @else
                    بسته
                    @endif
                </span><br>

                <div class="text-center">
                    <label class="text-xl">روز های کاری</label>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex mb-4">
                            {{$workingTime->saturdayEnd}}
                            <label class="text-xl mx-9">پایان کار شنبه</label>
                        </div>

                        <div class="flex ">
                            {{$workingTime->saturdayStart}}
                            <label class="text-xl">شروع کار شنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex mb-4">
                            {{$workingTime->sundayEnd}}
                            <label class="text-xl mx-2">پایان کار یک شنبه</label>
                        </div>
                        <div class="flex">
                            {{$workingTime->sundayStart}}
                            <label class="text-xl mx-2">شروع کار یک شنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row mb-4">
                        <div class="flex">
                            {{$workingTime->mondayEnd}}
                            <label class="text-xl mx-5">پایان کار دوشنبه</label>
                        </div>
                        <div class="flex">
                            {{$workingTime->mondayStart}}
                            <label class="text-xl mx-2">شروع کار دوشنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row mb-4">
                        <div class="flex">
                            {{$workingTime->tuesdayEnd}}
                            <label class="text-xl mx-2 ">پایان کار سه شنبه</label>
                        </div>
                        <div class="flex">
                            {{$workingTime->tuesdayStart}}
                            <label class="text-xl mx-2">شروع کار سه شنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row mb-4">
                        <div class="flex">
                            {{$workingTime->wednesdayEnd}}
                            <label class="text-xl mx-2">پایان کار چهارشنبه</label>
                        </div>
                        <div class="flex">
                            {{$workingTime->wednesdayStart}}
                            <label class="text-xl mx-2">شروع کار چهارشنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row mb-4">
                        <div class="flex">
                            {{$workingTime->thursdayEnd}}
                            <label class="text-xl mx-2">پایان کار پنجشنبه</label>
                        </div>
                        <div class="flex">
                            {{$workingTime->thursdayStart}}
                            <label class="text-xl mx-5">شروع کار پنجشنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row mb-4">
                        <div class="flex">
                            {{$workingTime->fridayEnd}}
                            <label class="text-xl mx-9">پایان کار جمعه</label>
                        </div>
                        <div class="flex">
                            {{$workingTime->fridayStart}}
                            <label class="text-xl mx-2">شروع کار جمعه</label>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</x-SellerApp-layout>