<x-AdminApp-layout>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl bold">
                اضافه کردن غذا به فودپارتی
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
            <form action="/admin/foodparty" method="post" enctype="multipart/form-data">
                @csrf
                <div class="block text-center">

                    <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="food_id" placeholder="آیدی غذا">

                    <input type="number" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="discount" placeholder="مقدار تخفیف">

                    <div class="mb-10">
                        <label>انتخاب ساعت</label>
                        <select name="time">
                            <option value="9-12">9-12</option>
                            <option value="12-15">12-15</option>
                            <option value="15-18">15-18</option>
                            <option value="18-21">18-21</option>
                            <option value="21-24">21-24</option>
                        </select>
                    </div>

                    <input type="date" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="date" placeholder="روز">

                    <button type="submit" class="bg-pink-600 block shadow-5xl mb-10 p-2 w-80 rounded font-bold text-white">
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