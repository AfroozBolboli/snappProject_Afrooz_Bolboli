<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    { 
        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;
        $orders = Order::where('restaurant_id', $restaurant_id)->where('status', 4)->get(); 
        $comments = null;
        foreach($orders as $order) 
        {
            $comment = Comment::where('order_id', $order->id)->first();
            if($comment)
                $comments[] = Comment::where('order_id', $order->id)->first();
        }
        return view('seller.comments.index', [
            'comments' => $comments
        ]);
    }

    public function  edit($id)
    {
        $comment = Comment::find($id);
        if($comment == null)
            return redirect('seller/comments');

        $restaurant_id = Restaurant::where('owner_id', auth()->user()->id)->first()->id;
        $order = Order::find($comment->order_id)->where('restaurant_id', $restaurant_id)->get();
        if($order == null)
            abort(403);
            
        return view('seller.comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->update([
            'sellerPermission' => $request->input('deletePermission'),
            'reply' => $request->input('reply')
        ]);


        return redirect('seller/comments');
    }
}
