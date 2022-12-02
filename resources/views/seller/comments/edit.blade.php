<x-SellerApp-layout>
    <div class="m-auto w-4/8 py-12 text-center">
        <x-slot name="header">
            <h2 class="text-3xl bold text-white leading-tight text-center">
                {{ __(' نظرات') }}
            </h2>
        </x-slot>
        <div class="text-center">
            <h1 class="text-5xl bold mt-32">
                اجازه ی انتشار نظر
            </h1>
        </div>

        <div class="flex justify-center pt-10">
            <form action="/seller/comments/{{$comment->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex justify-center space-x-16 font-bold text-xl text-pink-600">
                    <span>
                        نظر مشتری:
                        {{$comment->comment}}
                    </span>
                    <span>
                        امتیاز مشتری: {{$comment->score}}
                    </span>
                    <span>
                        آیدی سفارش: {{$comment->order_id}}
                    </span>
                </div>

        </div>

        <div class="flex justify-center space-x-5 my-5">
            <div>
                <input type="radio" value="0" name="deletePermission" class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500">
                <label>فرستادن درخواست پاک شدن به ادمین</label><br>
                <input type="radio" value="1" name="deletePermission" class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500" checked>
                <label>انتشار نظر</label><br>
            </div>
        </div>

        <div >
            <label for="reply" class="font-bold text-xl text-pink-600">جواب رستوران</label><br>
            <textarea name="reply" rows="4" class=" my-5 text-center rounded bg-pink-300" placeholder="نظر خود را اینجا بنویسید"></textarea>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-pink-500 rounded block shadow-5xl mb-10 p-2 w-80 font-bold text-white">
                ثبت
            </button>
        </div>

    </div>
    </form>
    </div>
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