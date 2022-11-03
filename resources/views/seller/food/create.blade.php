<x-SellerApp-layout>
    <div class="m-auto w-4/8 py-24">
            <div class="text-center">
                <h1 class="text-5xl uppercase bold">
                    ساختن بنر جدید
                </h1>
            </div>
            

            <div class="flex justify-center pt-20">
                <form action="/seller/food" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="block text-center">
                        <label class="text-2xl bold">عکس غذا</label>
                        <input
                            type="file"
                            class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-pink-400"
                            name="image">

                        <input
                            type="text"
                            class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400"
                            name="name" 
                            placeholder="اسم غذا">

                        <div class="flex justify-center space-x-5 mb-5">  
                            @foreach($categories as $category)
                            <input type="radio" value="{{$category->title}}" name="category"
                            class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500" >
                            <label>{{$category->title}}</label><br>
                            @endforeach
                        </div>

                        <input
                            type="text"
                            class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400"
                            name="ingredient" 
                            placeholder="مواد تشکیل دهنده ی غذا">

                        <input
                            type="number"
                            class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400"
                            name="price" 
                            placeholder="قیمت غذا">
                        
                        <button type="submit" class="bg-pink-600 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold text-white">
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

    </x-SellerApp-layout>