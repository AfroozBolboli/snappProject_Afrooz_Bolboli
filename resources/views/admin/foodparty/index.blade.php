<x-AdminApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('فودپارتی ') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
    
        <div class="flex justify-between">
            <a href="foodparty/create"
                class="italic text-xl bold text-pink-600 ">
                اضافه کردن غذا به فودپارتی &rarr;
            </a>
            <a href="foodparty/foodlist/all"
                class="italic text-xl bold text-pink-600 ">
                دیدن لیست غذاها&rarr;
            </a>
        </div>

        <div>
            
            <div class="divide-black mb-20 mt-10">
                <h1 class="text-lg">فودپارتی ساعت ۹ صبح تا ۱۲ ظهر</h1>
                @foreach($time1 as $food)
                    <div class="m-auto py-6 divide-black">
                        <div class="float-right ">
                            <a 
                                class="pb-2 italic text-green-600"
                                href="foodparty/{{$food->id}}/edit">ویرایش &rarr;</a>

                            <form action="foodparty/{{$food->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                type="submit"
                                class="pb-2 pt-3  italic text-red-600 "
                                >حذف &rarr;</button>
                            </form>
                        </div>
                        <div class="flex justify-center space-x-20 rounded-lg" >

                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                  آیدی غذا: {{$food->food_id}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                مقدار تخفیف: {{$food->discount}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                روز تخفیف: {{$food->date}}
                            </span>
                        </div>

                    </div>
                @endforeach
                <hr class="mt-1">
            </div>

            <div class="divide-black mb-20">
                <h1 class="text-lg">فودپارتی ساعت ۱۲ عصر تا ۳ بعدظهر</h1>
                @foreach($time2 as $food)
                    <div class="m-auto py-6 divide-black">
                        <div class="float-right ">
                            <a 
                                class="pb-2 italic text-green-600"
                                href="foodparty/{{$food->id}}/edit">ویرایش &rarr;</a>

                            <form action="foodparty/{{$food->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                type="submit"
                                class="pb-2 pt-3  italic text-red-600 "
                                >حذف &rarr;</button>
                            </form>
                        </div>
                        <div class="flex justify-center space-x-20 rounded-lg" >

                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                  آیدی غذا: {{$food->food_id}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                مقدار تخفیف: {{$food->discount}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                روز تخفیف: {{$food->date}}
                            </span>
                        </div>

                    </div>
                @endforeach
                <hr class="mt-10">
            </div>

            <div class="divide-black mb-20">
                <h1 class="text-lg">فودپارتی ساعت ۳ بعدظهر تا ۶ عصر</h1>
                @foreach($time3 as $food)
                    <div class="m-auto py-6 divide-black">
                        <div class="float-right ">
                            <a 
                                class="pb-2 italic text-green-600"
                                href="foodparty/{{$food->id}}/edit">ویرایش &rarr;</a>

                            <form action="foodparty/{{$food->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                type="submit"
                                class="pb-2 pt-3  italic text-red-600 "
                                >حذف &rarr;</button>
                            </form>
                        </div>
                        <div class="flex justify-center space-x-20 rounded-lg" >

                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                  آیدی غذا: {{$food->food_id}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                مقدار تخفیف: {{$food->discount}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                روز تخفیف: {{$food->date}}
                            </span>
                        </div>

                    </div>
                @endforeach
                <hr class="mt-10">
            </div>

            <div class="divide-black mb-20">
                <h1 class="text-lg">فودپارتی ساعت ۶ عصر تا ۹ شب</h1>
                @foreach($time4 as $food)
                    <div class="m-auto py-6 divide-black">
                        <div class="float-right ">
                            <a 
                                class="pb-2 italic text-green-600"
                                href="foodparty/{{$food->id}}/edit">ویرایش &rarr;</a>

                            <form action="foodparty/{{$food->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                type="submit"
                                class="pb-2 pt-3  italic text-red-600 "
                                >حذف &rarr;</button>
                            </form>
                        </div>
                        <div class="flex justify-center space-x-20 rounded-lg" >

                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                  آیدی غذا: {{$food->food_id}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                مقدار تخفیف: {{$food->discount}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                روز تخفیف: {{$food->date}}
                            </span>
                        </div>

                    </div>
                @endforeach
                <hr class="mt-10">
            </div>

            <div class="divide-black mb-20">
                <h1 class="text-lg">فودپارتی ساعت ۹ شب تا ۱۲ نیمه شب</h1>
                @foreach($time5 as $food)
                    <div class="m-auto py-6 divide-black">
                        <div class="float-right ">
                            <a 
                                class="pb-2 italic text-green-600"
                                href="foodparty/{{$food->id}}/edit">ویرایش &rarr;</a>

                            <form action="foodparty/{{$food->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                type="submit"
                                class="pb-2 pt-3  italic text-red-600 "
                                >حذف &rarr;</button>
                            </form>
                        </div>
                        <div class="flex justify-center space-x-20 rounded-lg" >

                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                  آیدی غذا: {{$food->food_id}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                مقدار تخفیف: {{$food->discount}}
                            </span>
                            <span class="uppercase text-pink-600 font-bold text-xl italic ">
                                روز تخفیف: {{$food->date}}
                            </span>
                        </div>

                    </div>
                @endforeach
                <hr class="mt-10">
            </div>
        </div>


    </div>
    
</x-AdminApp-layout>