<!DOCTYPE html>
@extends('layouts.base')

{{-- navber.blade.phpの@yield('title')に'新規作成'を埋め込む --}}
@section('title', '編集')

@section('content')
    <div class="container">
        <form action="{{ action('PostController@edit') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
                <div class="form-group row">
                    <label class="col-md-2">名前</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{ $posts->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="20">{{ $posts->body }}</textarea>
                    </div>
                </div>
                {{--重要！--}}
                <input type="hidden" name="id" value="{{ $posts->id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
                <a href="{{ action('PostController@delete', ['id' => $posts->id]) }}" class="delete-button btn btn-secondary">削除</a>
        </form>
    </div>
@endsection