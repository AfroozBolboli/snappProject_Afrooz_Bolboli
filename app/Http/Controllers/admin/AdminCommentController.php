<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('sellerPermission', 0)->where('adminPermission', NULL)->get();
        return view('admin.comments.index')->with('comments', $comments);
    }

    public function  edit($id)
    {
        $comment = Comment::find($id);

        if($comment == NULL)
            return redirect('admin/comments');
    
        return view('admin.comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if($request->input('deletePermission'))
            $comment->delete();
        else
            $comment->update([
                'adminPermission' => 1
            ]);
            
        return redirect('admin/comments');
    }
}
