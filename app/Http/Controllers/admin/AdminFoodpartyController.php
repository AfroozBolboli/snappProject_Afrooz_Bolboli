<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminFoodpartRequest;
use App\Models\Food;
use App\Models\Foodparty;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class AdminFoodpartyController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        $time1 = Foodparty::where('time', '9-12')->get();
        $time2 = Foodparty::where('time', '12-15')->get();
        $time3 = Foodparty::where('time', '15-18')->get();
        $time4 = Foodparty::where('time', '18-21')->get();
        $time5 = Foodparty::where('time', '21-24')->get();

        return view('admin.foodparty.index',[
            'time1' => $time1,
            'time2' => $time2,
            'time3' => $time3,
            'time4' => $time4,
            'time5' => $time5,
        ]); 
    }

    public function create()
    {
        return view('admin.foodparty.create');
    }

    public function store(AdminFoodpartRequest $request)
    {
        $request->validated();

        $foodparty = Foodparty::create([
            'food_id' => $request->input('food_id'),
            'discount' => $request->input('discount'),
            'time' => $request->input('time'),
            'date' => $request->input('date'),
        ]);

        return redirect('admin/foodparty');
    }

    public function edit($id)
    {
        $food = Foodparty::find($id);
        return view('admin.foodparty.edit')->with('food', $food);
    }

    public function update(AdminFoodpartRequest $request, $id)
    {
        $request->validated();

        $foodparty = Foodparty::find($id)
            ->update([
            'food_id' => $request->input('food_id'),
            'discount' => $request->input('discount'),
            'time' => $request->input('time'),
            'date' => $request->input('date'),
        ]);

        return redirect('admin/foodparty');
    ;

    return redirect('admin/foodCategory');
    }

    public function destroy($id)
    {
        $food = Foodparty::find($id);
        $food->delete();
        return redirect('admin/foodparty');
    }

    public function foodlist()
    {
        $foods = Food::where('foodParty', '1')->get();
        return view('admin.foodparty.foodlist')->with('foods', $foods); 
    }
}
