<x-AdminApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('دسته بندی رستوران ها  ') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
    
        <div class="float">
            <a href="restaurantCategory/create"
                class="italic text-xl bold text-pink-600 ">
                اضافه کردن دسته بندی رستوران جدید &rarr;
            </a>
        </div>

        <div class="w-5/6 py-10">
            @foreach($categories as $category)
                <div class="m-auto py-6 divide-black">
                    <div class="float-right ">
                        <a 
                            class="pb-2 italic text-green-600"
                            href="restaurantCategory/{{$category->id}}/edit">ویرایش &rarr;</a>

                        <form action="restaurantCategory/{{$category->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button
                            type="submit"
                            class="pb-2 pt-3  italic text-red-600 "
                            >حذف &rarr;</button>
                        </form>
                    </div>
                    <div class="flex justify-center space-x-20 " >
                        <img 
                        src="{{ asset('storage/adminRestaurantCategory/'.$category->image_path) }}" 
                        class="w-2/12 mb-4 shadow-xl rounded-full"
                        alt="{{$category->title}}">

                        <span class="uppercase text-pink-600 font-bold text-xl italic ">
                            اسم دسته بندی: {{$category->title}}
                        </span>
                    </div>


                    <hr class="mt-5 mb-8">
                </div>
            @endforeach
        </div>

    </div>
    
</x-AdminApp-layout>