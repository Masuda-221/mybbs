<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Validator;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function add()
    {
        return view('create');
    }

    public function create(Request $request)
    {
        $this->validate($request,Post::$rules);
        
        $posts = new Post;
        $form = $request->all();
        
        unset($form['_token']);
        
        
        $posts->fill($form);
        
        $posts->save();
        return redirect('create');
    }
    
    public function index(Request $request)
    {
        
        // $posts = Post::all()->paginate(5);
        $posts = Post::query()->paginate(5);
        // $posts = DB::table('posts')
        return view('index', ['posts' => $posts,]);
    }

    public function edit(Request $request)
    {
        $posts = Post::find($request->id);
        if (empty($posts)) {
        abort(404);    
        }
        return view('edit', ['posts' => $posts]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Post::$rules);
        // PostModelからfindメソッドでidにひもずくデータを取得する
        $posts = Post::find($request->id);
        // 送信されてきたフォームデータを格納する
        $posts_form = $request->all();
        unset($posts['_token']);
        
        // 該当するデータを上書きして保存する
        $posts->fill($posts_form)->save();
        
        return redirect('index');
    }
    
    public function delete(Request $request)
    {
        $posts = Post::find($request->id);
        
        $posts->delete();
        return redirect('index');
    }  
}
