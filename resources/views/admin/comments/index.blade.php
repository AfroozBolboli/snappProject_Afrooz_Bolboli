<x-AdminApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __(' نظرات') }}
        </h2>
    </x-slot>

    <div class="m-auto w-11/12 py-6">
        <div class="flex justify-center">
        </div>
        <div class="w-11/12 py-5">
            @if($comments != null)
            @foreach($comments as $comment)
            <div class="py-6 divide-black">
                <div class="float-left">
                    <a class="pb-2 italic text-green-600" href="comments/{{$comment->id}}/edit">ویرایش &rarr;</a>
                </div>
                <div class="flex justify-center space-x-12 font-bold text-xl text-pink-600">
                    <span class="text-right">
                        نظر مشتری:<br>
                        {{$comment->comment}}
                    </span>
                    <span class="text-center">
                        امتیاز مشتری: {{$comment->score}}
                    </span>
                    <span class="text-center">
                        آیدی سفارش: {{$comment->order_id}}
                    </span>
                </div>
                <hr class="mt-8 mb-8">
            </div>
            @endforeach
            @else
            <h3 class="text-center text-3xl font-bold mb-16">
                کامنتی یافت نشد
            </h3>
            @endif
        </div>


    </div>

</x-AdminApp-layout>