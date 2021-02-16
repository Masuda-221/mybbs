<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Validator;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        $post = Post::find($request->post_id);
        
      if (empty($post)) {
        abort(404);    
      }
      return view('commentcreate', ['post_form' => $post]);
  }
    
    public function store(Request $request)
    {
        
        $this->validate($request,Comment::$rules);
        
        $comment = new Comment;
        // $form = $request->all();
        
        // unset($form['_token']);
        
        
        // $comment->fill($form);
        
        // $comment->save();
        // return redirect('/');
        $comment->body = $request->body;
        $comment->name = $request->name;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect('/');
    }
    
    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
