<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\CommentRequest;
use App\Http\Requests\customer\PostCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CustomerCommentController extends Controller
{
    public function index(CommentRequest $request)
    {

        if ($request->input('restaurant_id')) 
        {

            $orders = Order::where('restaurant_id', $request->input('restaurant_id'))
                ->where('customer_id', auth()->user()->id)
                ->where('status', 4)
                ->get();

            $comments = null;

            foreach ($orders as $order) 
            {
                $comment = Comment::where('order_id', $order->id)->first();
                if($comment)
                {
                    if($comment->sellerPermission)
                        $comments[] = $comment;
                    elseif($comment->adminPermission)
                        $comments[] = $comment;
                }
            }

            return ['comments' => CommentResource::collection($comments)];
        }elseif ($request->input('food_id')) 
        {

            $orders_id = OrderFood::where('food_id', $request->input('food_id'))
                ->get('order_id');
            $orders = null;

            foreach($orders_id as $order_id)
            {
                $order = Order::where('id', $order_id->order_id)->where('customer_id', auth()->user()->id)->first();
                if($order)
                    $orders[] = $order;
                
            }

            $comments = null;

            foreach ($orders as $order) {
                $comment = Comment::where('order_id', $order->id)->first();

                if($comment)
                {
                    if($comment->sellerPermission)
                        $comments[] = $comment;
                    elseif($comment->adminPermission)
                        $comments[] = $comment;
                }

            }

            return $comments;
        } else
            return response([
                'message' => 'آیدی وارد شده متعلق به شما نیست'
            ], 404);
    }

    public function store(PostCommentRequest $request)
    {
        $order = Order::find($request->input('order_id'));
        if (!Gate::allows('customerComment', $order)) {
            return response([
                'message' => 'آیدی وارد شده آیدی سبد خرید شما نیست',
                'statusCode' => 403
            ], 403);
        }

        $comment = Comment::where('order_id', $request->input('order_id'))->first();
        if($comment)
            return response([
                'message' => 'شما قبلا یک نظر درباره این سفارش داده اید',
            ], 200);

        $comment = Comment::create([
            'order_id' => $request->input('order_id'),
            'score' => $request->input('score'),
            'comment' => $request->input('comment'),
        ]);

        return response([
            'message' => 'نظر شما با موفقیت ثبت شد'
        ],200);
    }
}
