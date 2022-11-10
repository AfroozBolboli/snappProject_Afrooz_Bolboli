<x-SellerApp-layout>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl bold">
                تغییر اطلاعات رستوران 
            </h1>
        </div>

        <div class="flex justify-center pt-20">
            <form action="/seller/setting/{{$restaurant->id}}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="block text-center">
                    <label class="text-2xl bold">عکس رستوران</label>
                        <input
                            type="file"
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-pink-400"
                            name="image">

                        <input
                            type="text"
                            class="block shadow-5xl mb-3 p-2 w-80 italic text-right placeholder-pink-400"
                            name="name" 
                            value="{{$restaurant->name}}"
                            placeholder="اسم رستوران">

                        <div class="mb-5"> 
                            <label class="bold text-lg">دسته بندی رستوران</label><br>
                            <div class="flex justify-center space-x-5 mb-5">  
                            @foreach($categories as $category)
                            <input type="checkbox" value="{{$category->title}}" name="categories[]"
                            class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500" >
                            <label>{{$category->title}}</label><br>
                            @endforeach
                            </div>

                        </div>

                        <input
                            type="text"
                            class="block shadow-5xl my-5 p-2 w-80 italic text-right placeholder-pink-400"
                            name="accountNumber" 
                            value="{{$restaurant->accountNumber}}"
                            placeholder="شماره حساب رستوران">

                        
                        <input
                            type="text"
                            class="block shadow-5xl mb-3 p-2 w-80 italic text-right placeholder-pink-400"
                            name="address" 
                            value="{{$restaurant->address}}"
                            placeholder="آدرس رستوران">
                        
                        <input
                            type="text"
                            class="block shadow-5xl mb-3 p-2 w-80 italic text-right placeholder-pink-400"
                            name="workingDay" 
                            value="{{$restaurant->workingDay}}"
                            placeholder="ساعت کاری رستوران">

                        <input
                            type="number"
                            class="block shadow-5xl mb-5 p-2 w-80 italic text-right placeholder-pink-400"
                            name="shippingCost" 
                            value="{{$restaurant->shippingCost}}"
                            placeholder="هزینه ی ارسال رستوران">

                        <div class="mb-5 rounded focus:ring-pink-500 text-pink-500">
                            <label>وضعیت رستوران</label><br>
                            <label>بسته</label>
                            <input type="radio" name="status" value="1">
                            <label>باز</label>
                            <input type="radio" name="status" value="0">

                        </div>

                    <button type="submit" class="bg-pink-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold text-white">
                        ثبت 
                    </button>

                </div>
            </form>
        </div>
    </div>
</x-SellerApp-layout>