@extends('layouts.base')
@section('title', '登録済み記事一覧')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif
        
        @foreach($posts as $post)
            <div class="card text-center mt-5 rounded-0">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="name-colom text-left">{{ $post->name }}<span class="date-colom pl-3">/</span><span class="date-colom pl-3">{{ $post->created_at }}</span></div>
                        
                        {{--offsetは空白の〇個のグリッドを左に入れる--}}
                        </div>
                        <div class="col-md-1 offset-md-5">
                            <a href="{{ action('PostController@edit', ['id' => $post->id]) }}" class="edit-button btn btn-primary btn-block">編集</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                        
                    <p class="card-text text-left pb-5 border-bottom border-dark">{{ $post->body }}</p>
                    
                    <div id="comment-post-{{ $post->id }}">
                    @foreach ($post->comments as $comment) 
                        <div class="mb-2">
                            <p class="comment-name text-left">{{ $comment->name }}<span class="comment-body pl-3">{{ $comment->body }}</span></p>
                        </div>
                    @endforeach
                </div>
                </div>
                
                <div class="card-footer text-muted">
                    
                    <div class="col-md-2 offset-md-5">
                        <a href="{{ action('CommentController@add', ['id' => $post->id]) }}" class="btn btn-primary btn-block">コメント</a>
                    </div>
                
                    
                        <!--<div id="comment-form-post-{{ $post->id }}">-->
                        <!--    <form action="/posts/{{ $post->id }}/comments" method="post" enctype="multipart/form-data">-->
                                
                        <!--        {{csrf_field()}} -->
                        <!--        <div class="row">-->
                        <!--            <div class="col-md-2">-->
                        <!--                <input value="{{ $post->id }}" type="hidden" name="post_id" />-->
                        <!--                <input type="text" class="form-control" placeholder="名前" name="name" value="{{ old('name') }}">-->
                        <!--            </div>-->
                        <!--            <div class="col-md-9">-->
                        <!--                <textarea class="form-control"  placeholder="コメント ..." name="body" rows="1">{{ old('body') }}</textarea>-->
                        <!--            </div>-->
                        <!--            <div class="col-md-1">-->
                        <!--                <input type="submit" class="btn btn-primary" value="投稿">-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->
                    
                </div>
            </div>
            @endforeach
        <div class="row mt-5">
            <div class="pagenation col-md-12">
                
            
            {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection