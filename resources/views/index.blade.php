@extends('layouts.base')
@section('title', '登録済み記事一覧')

@section('content')
    <div class="container">
        <form action="{{ action('PostController@index') }}" method="get">
            @foreach($posts as $post)
            <div class="card text-center mt-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-2">{{ $post->name }}</div>
                        <div class="col-md-2">{{ $post->created_at }}</div>
                        {{--offsetは空白の〇個のグリッドを左に入れる--}}
                        <div class="col-md-1 offset-md-7"><a href="{{ action('PostController@edit', ['id' => $post->id]) }}" class="btn btn-primary btn-block">編集</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                        
                    <p class="card-text text-left">{{ $post->body }}</p>
                
                </div>
                <div class="card-footer text-muted">
                
                    <div id="comment-post-{{ $post->id }}">
                    @foreach ($posts->comments as $comment) 
                        <div class="mb-2">
                            <span>
                            <strong>
                                <a class="no-text-decoration black-color">{{ $comment->post->name }}</a>
                            </strong>
                            </span>
                            <span>{{ $comment->body }}</span>
                        </div>
                    @endforeach
                    </div>
                    @Auth
                        <div class="row actions" id="comment-form-post-{{ $post->id }}">
                            <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                                {{csrf_field()}} 
                                
                                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="body" />
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
            @endforeach
            
        </from>
    </div>
@endsection