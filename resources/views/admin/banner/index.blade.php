<x-AdminApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('بنرهای غذا') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
    
        <div class="float">
            <a href="banner/create"
                class="italic text-xl bold text-pink-600 ">
                اضافه کردن بنر جدید &rarr;
            </a>
        </div>

        <div class="w-5/6 py-10">
            @foreach($banners as $banner)
                <div class="m-auto py-6 divide-black">
                    <div class="float-right ">
                        <a 
                            class="pb-2 italic text-green-600"
                            href="banner/{{$banner->id}}/edit">ویرایش &rarr;</a>

                        <form action="banner/{{$banner->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button
                            type="submit"
                            class="pb-2 pt-3  italic text-red-600 "
                            >حذف &rarr;</button>
                        </form>
                    </div>
                    <div class=" text-center " >
                        <img 
                        src="{{ asset('storage/adminBanner/'.$banner->image_path) }}" 

                        class="w-10/12 mb-4 shadow-xl rounded-lg"
                        alt="{{$banner->title}}">

                        <span class="uppercase text-pink-600 font-bold text-xl italic ">
                            اسم بنر: {{$banner->title}}
                        </span>
                    </div>


                    <hr class="mt-5 mb-8">
                </div>
            @endforeach
        </div>

    </div>
    
</x-AdminApp-layout>