<x-SellerApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('بنرهای غذا ') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
    
        <div class="float">
            <a href="food/create"
                class="italic text-xl bold text-pink-600 ">
                اضافه کردن غذای جدید &rarr;
            </a>
        </div>

        <div class="w-5/6 py-10">
            @foreach($foods as $food)
                <div class="m-auto py-6 divide-black">
                    <div class="float-right ">
                        <a 
                            class="pb-2 italic text-green-600"
                            href="food/{{$food->id}}/edit">ویرایش &rarr;</a>

                        <form action="food/{{$food->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button
                            type="submit"
                            class="pb-2 pt-3  italic text-red-600 "
                            >حذف &rarr;</button>
                        </form>
                    </div>
                    <div class=" text-center flex justify-center space-x-20 space-y-16" >
                        <img 
                        src="{{ asset('images/'.$food->image_path) }}" 
                        class="w-3/12 mb-4 shadow-xl rounded-full"
                        alt="{{$food->title}}">

                    <div class="text-pink-600 font-bold text-xl italic" >
                        <span>
                            اسم غذا: {{$food->name}}
                        </span><br>
                        <span>
                            مواد تشکیل دهنده غذا: {{$food->ingredient}}
                        </span><br>
                        <span>
                            قیمت غذا: {{$food->price}} تومن
                        </span><br>
                    </div>

                    </div>


                    <hr class="mt-5 mb-8">
                </div>
            @endforeach
        </div>

    </div>
    
</x-SellerApp-layout>