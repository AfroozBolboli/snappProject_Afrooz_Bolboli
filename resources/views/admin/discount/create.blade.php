<x-AdminApp-layout>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl bold">
                ساختن تخفیف جدید
            </h1>
        </div>

        <div class="w-4/8 pt-5">
            @if(!empty($error))
            <li class="text-red-500 list-none bold text-xl text-center">
                {{$error}}
            </li>
            @endif
        </div>

        <div class="flex justify-center pt-10">
            <form action="/admin/discount" method="post">
                @csrf
                <div class="block text-center">

                    <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="title" placeholder="کد تخیف"><br>

                    <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="restaurant_name" placeholder="اسم رستوران"><br>

                    <input type="number" class="block shadow-5xl mb-5 p-2 w-80 italic text-right placeholder-pink-400" name="price" placeholder="مقدار تخفیف"><br>

                    <label>تاریخ شروع تخفیف</label>
                    <input type="datetime-local" class="block shadow-5xl mb-5 p-2 w-80 italic text-right placeholder-pink-400" name="startingDate" placeholder="روز شروع تخفیف"><br>

                    <label>تاریخ انقضای تخفیف</label>
                    <input type="datetime-local" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="endingDate" placeholder="روز پایان تخفیف">

                    <button type="submit" class="bg-pink-600 rounded block shadow-5xl mb-10 p-2 w-80 font-bold text-white">
                        ثبت
                    </button>
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

</x-AdminApp-layout>