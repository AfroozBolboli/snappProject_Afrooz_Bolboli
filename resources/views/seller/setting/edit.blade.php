<x-SellerApp-layout>
    <div class="m-auto w-4/8 py-8">
        <div class="text-center">
            <h1 class="text-5xl bold">
                تغییر اطلاعات رستوران
            </h1>
        </div>


        <form action="/seller/setting/{{$restaurant->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-row pt-20 ">
                <div class="basis-1/2 flex justify-center">
                    <div class="block text-center">
                        <label class="text-2xl bold">عکس رستوران</label>
                        <input type="file" class="block shadow-5xl mb-5 p-2 w-80 italic placeholder-pink-400" name="image">

                        <input type="text" class="block shadow-5xl mb-3 p-2 w-80 italic text-right placeholder-pink-400" name="name" value="{{$restaurant->name}}" placeholder="اسم رستوران">

                        <div class="mb-5">
                            <label class="bold text-lg">دسته بندی رستوران</label><br>
                            <div class="flex justify-center space-x-5 mb-5">
                                @foreach($categories as $category)
                                <input type="checkbox" value="{{$category->title}}" name="categories[]" class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500">
                                <label>{{$category->title}}</label><br>
                                @endforeach
                            </div>

                        </div>

                        <input type="text" class="block shadow-5xl my-5 p-2 w-80 italic text-right placeholder-pink-400" name="accountNumber" value="{{$restaurant->accountNumber}}" placeholder="شماره حساب رستوران">


                        <input type="text" class="block shadow-5xl mb-3 p-2 w-80 italic text-right placeholder-pink-400" name="address" value="{{$restaurant->address}}" placeholder="آدرس رستوران">

                        <input type="text" class="block shadow-5xl mb-3 p-2 w-80 italic text-right placeholder-pink-400" name="workingDay" value="{{$restaurant->workingDay}}" placeholder="ساعت کاری رستوران">

                        <input type="number" class="block shadow-5xl mb-5 p-2 w-80 italic text-right placeholder-pink-400" name="shippingCost" value="{{$restaurant->shippingCost}}" placeholder="هزینه ی ارسال رستوران">

                        <div class="mb-5 rounded focus:ring-pink-500 text-pink-500">
                            <label>وضعیت رستوران</label><br>
                            <label>بسته</label>
                            <input type="radio" name="status" value="1">
                            <label>باز</label>
                            <input type="radio" name="status" value="0">

                        </div>

                    </div>
                </div>
                <div class="text-center ">
                    <label class="text-xl">روز های کاری</label>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex ">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="saturdayEnd" value="{{$restaurant->shippingCost}}" placeholder=" شروع شنبه ">
                            <label class="text-xl mx-9">ساعت پایان کار شنبه</label>
                        </div>

                        <div class="flex">
                            <input type="time" class="block shadow-5xl mx-2 mb-5 p-2 text-pink-400" name="saturdayStart" value="{{$restaurant->shippingCost}}" placeholder="پایان شنبه">
                            <label class="text-xl">ساعت شروع کار شنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="sundayEnd" value="{{$restaurant->shippingCost}}" placeholder=" شروع شنبه ">
                            <label class="text-xl mx-2">ساعت پایان کار یک شنبه</label>
                        </div>
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="sundayStart" value="{{$restaurant->shippingCost}}" placeholder="پایان شنبه">
                            <label class="text-xl mx-2">ساعت شروع کار یک شنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="mondayEnd" value="{{$restaurant->shippingCost}}" placeholder=" شروع شنبه ">
                            <label class="text-xl mx-5">ساعت پایان کار دوشنبه</label>
                        </div>
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="mondayStart" value="{{$restaurant->shippingCost}}" placeholder="پایان شنبه">
                            <label class="text-xl mx-2">ساعت شروع کار دوشنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="tuesdayEnd" value="{{$restaurant->shippingCost}}" placeholder=" شروع شنبه ">
                            <label class="text-xl mx-2 ">ساعت پایان کار سه شنبه</label>
                        </div>
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="tuesdayStart" value="{{$restaurant->shippingCost}}" placeholder="پایان شنبه">
                            <label class="text-xl mx-4">ساعت شروع کار سه شنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="wednesdayEnd" value="{{$restaurant->shippingCost}}" placeholder=" شروع شنبه ">
                            <label class="text-xl mx-2">ساعت پایان کار چهارشنبه</label>
                        </div>
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="wednesdayStart" value="{{$restaurant->shippingCost}}" placeholder="پایان شنبه">
                            <label class="text-xl mx-2">ساعت شروع کار چهارشنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="thursdayEnd" value="{{$restaurant->shippingCost}}" placeholder=" شروع شنبه ">
                            <label class="text-xl mx-2">ساعت پایان کار پنجشنبه</label>
                        </div>
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="thursdayStart" value="{{$restaurant->shippingCost}}" placeholder="پایان شنبه">
                            <label class="text-xl mx-5">ساعت شروع کار پنجشنبه</label>
                        </div>
                    </div>
                    <div class="flex justify-center space-x-5 flex-row">
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="fridayEnd" value="{{$restaurant->shippingCost}}" placeholder=" شروع شنبه ">
                            <label class="text-xl mx-9">ساعت پایان کار جمعه</label>
                        </div>
                        <div class="flex">
                            <input type="time" class="block shadow-5xl mb-5 p-2 text-pink-400" name="fridayStart" value="{{$restaurant->shippingCost}}" placeholder="پایان شنبه">
                            <label class="text-xl mx-2">ساعت شروع کار جمعه</label>
                        </div>
                    </div>

                </div>

            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-pink-500 block shadow-5xl mb-10 p-2 w-80 font-bold text-white">
                    ثبت
                </button>
            </div>

        </form>

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