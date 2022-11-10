<x-AdminApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __('تخفیف های غذا ') }}
        </h2>
    </x-slot>

    <div class="m-auto w-4/5 py-12">
    
        <div class="float">
            <a href="discount/create"
                class="italic text-xl bold text-pink-600 ">
                اضافه کردن تخفیف جدید &rarr;
            </a>
        </div>

        <div class="w-5/6 py-10">
            @foreach($discounts as $discount)
                <div class="m-auto py-6 divide-black">
                    <div class="float-right">
                        <form action="discount/{{$discount->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button
                            type="submit"
                            class="pb-2 pt-3  italic text-red-600 "
                            >حذف &rarr;</button>
                        </form>
                    </div>
                    <div class=" text-center flex justify-center space-x-10 space-y-16 " >
                        <br><span class="text-pink-600 font-bold text-xl italic ">
                            کد تخفیف: {{$discount->title}}
                        </span>
                        <span class="text-pink-600 font-bold text-xl italic ">
                            اسم رستوران: {{$discount->restaurant_name}}
                        </span>
                        <span class="text-pink-600 font-bold text-xl italic ">
                            مقدار تخفیف: {{$discount->price}}
                        </span>
                        <span class="text-pink-600 font-bold text-xl italic ">
                            زمان شروع تخفیف: {{$discount->startingDate}}
                        </span>
                        <span class="text-pink-600 font-bold text-xl italic ">
                            زمان پایان تخفیف: {{$discount->endingDate}}
                        </span>
                    </div>


                    <hr class="mt-5 mb-8">
                </div>
            @endforeach
        </div>

    </div>
    
</x-AdminApp-layout>