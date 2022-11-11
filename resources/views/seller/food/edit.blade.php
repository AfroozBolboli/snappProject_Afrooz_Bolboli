<x-SellerApp-layout>
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl bold">
                تغییر غذا 
            </h1>
        </div>

        <div class="flex justify-center pt-20">
            <form action="/seller/food/{{$food->id}}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="block text-center">
                    <label class="text-2xl bold">عکس غذا</label>
                        <input
                            type="file"
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-pink-400"
                            name="image">

                        <input
                            type="text"
                            class="block shadow-5xl mb-3 p-2 w-80 italic text-right placeholder-pink-400"
                            name="name" 
                            value="{{$food->name}}"
                            placeholder="اسم غذا">

                        
                        <label>تخفیف</label><br>
                        <select name="discount">
                            <option value="0"> هیچکدام</option>
                            @foreach($discounts as $discount)
                                <option value="{{$discount->price}}">{{$discount->price}}قیمت  {{$discount->title}}کد </option>
                            @endforeach
                        </select>

                        <div class="flex justify-center space-x-5 mb-5"> 
                            @foreach($categories as $category)
                            <div>
                            <input type="radio" value="{{$category->title}}" name="category"
                            class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500" >
                            <label>{{$category->title}}</label><br>

                            @endforeach
                            </div> 

                        </div>

                        <input
                            type="text"
                            class="block shadow-5xl my-5 p-2 w-80 italic text-right placeholder-pink-400"
                            name="ingredient" 
                            value="{{$food->ingredient}}"
                            placeholder="مواد تشکیل دهنده ی غذا">

                        <input
                            type="number"
                            class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400"
                            name="price" 
                            value="{{$food->price}}"
                            placeholder="قیمت غذا">

                        <div class="flex justify-center space-x-5 mb-5 ">  
                            <input type="hidden" name="foodparty" value="0">
                            <input type="checkbox" value="1" name="foodparty"
                            class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500" >
                            <label>اضافه کردن به فودپارتی</label><br>
                        </div>

                    <button type="submit" class="bg-pink-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold text-white">
                        ثبت 
                    </button>

                </div>
            </form>
        </div>
    </div>
</x-SellerApp-layout>