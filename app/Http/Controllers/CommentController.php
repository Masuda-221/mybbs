<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Validator;

class CommentController extends Controller
{
    public function commentsstore(Request $request)
    {
        
        $this->validate($request,Post::$rules);
        
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->name = $request->name;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect('/');
    }
    
    public function commentsdestroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
