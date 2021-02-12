<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function index()
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
      // createにリダイレクトする
      return redirect('create');
    }

    public function edit()
    {
        return view('edit');
    }

    public function update()
    {
        return redirect('edit');
    }
}
