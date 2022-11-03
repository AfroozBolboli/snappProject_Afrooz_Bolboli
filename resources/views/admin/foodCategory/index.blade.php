<x-AdminApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('دسته بندی غذا ها  ') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
    
        <div class="float">
            <a href="foodCategory/create"
                class="italic text-xl bold text-pink-600 ">
                اضافه کردن دسته بندی غذا جدید &rarr;
            </a>
        </div>

        <div class="w-5/6 py-10">
            @foreach($foods as $food)
                <div class="m-auto py-6 divide-black">
                    <div class="float-right ">
                        <a 
                            class="pb-2 italic text-green-600"
                            href="foodCategory/{{$food->id}}/edit">ویرایش &rarr;</a>

                        <form action="foodCategory/{{$food->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button
                            type="submit"
                            class="pb-2 pt-3  italic text-red-600 "
                            >حذف &rarr;</button>
                        </form>
                    </div>
                    <div class="flex justify-center space-x-20 rounded-lg" >
                        <img 
                        src="{{ asset('images/'.$food->image_path) }}" 
                        class="w-2/12 mb-4 shadow-xl rounded-full"
                        alt="{{$food->title}}">

                        <span class="uppercase text-pink-600 font-bold text-xl italic ">
                            اسم دسته بندی: {{$food->title}}
                        </span>
                    </div>


                    <hr class="mt-5 mb-8">
                </div>
            @endforeach
        </div>

    </div>
    
</x-AdminApp-layout>