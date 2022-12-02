<x-SellerApp-layout>
    <x-slot name="header">
        <h2 class="text-3xl bold text-white leading-tight text-center">
            {{ __(' نظرات') }}
        </h2>
    </x-slot>

    <div class="m-auto w-11/12 py-6">
        <div class="flex justify-center">
            <form action="{{url('seller/comments/filter')}}" method="post">
                @csrf
                <div class=" m-4 mx-10 form-control text-right">
                    <label>فیلتر براساس غذا</label><br>
                    <input type="search" name='commentFilter' class="m-3">
                    <button type="submit" class="bg-gray-800 rounded block mx-auto shadow-5xl mb-10 p-1 w-2/4 font-bold text-white">
                        جست و جو
                    </button>
                </div>
            </form>
        </div>
        <div class="w-11/12 py-5">
            @if($comments != null)
            @foreach($comments as $comment)
            <div class="py-6 divide-black">
                <div class="float-left">
                    <a class="pb-2 italic text-green-600" href="comments/{{$comment->id}}/edit">ویرایش &rarr;</a>
                </div>
                <div class="flex justify-center space-x-12 font-bold text-xl text-pink-600">
                    <span class="text-center">
                        اجازه ی انتشار نظر:
                        @if($comment->sellerPermission == 1)
                            دارد
                        @else
                            ندارد
                        @endif
                    </span>
                    <span class="text-right">
                        نظر مشتری:<br>
                        {{$comment->comment}}
                    </span>
                    <span class="text-right">
                        جواب رستوران:<br>
                        {{$comment->reply}}
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

</x-SellerApp-layout>