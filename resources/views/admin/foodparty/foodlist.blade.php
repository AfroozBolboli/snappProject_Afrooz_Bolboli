<x-AdminApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('فودپارتی ') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
        <div class="w-5/6 py-10">
            @foreach($foods as $food)
                <div class="m-auto py-3 divide-pink-500">
                    <div class="flex justify-center space-x-20 rounded-lg" >

                        <span class=" text-pink-600 font-bold text-md italic ">
                            اسم غذا: {{$food->name}}
                        </span>
                        <span class=" text-pink-600 font-bold text-md italic ">
                            آیدی رستوران: {{$food->restaurant_id}}
                        </span>
                        <span class=" text-pink-600 font-bold text-md italic ">
                            آیدی غذا: {{$food->id}}
                        </span>
                    </div>

                    <hr class="mt-1">
                </div>
            @endforeach
        </div>
    </div>
    
</x-AdminApp-layout>