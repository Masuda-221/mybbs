<!DOCTYPE html>
@extends('layouts.base')

{{-- navber.blade.phpの@yield('title')に'新規作成'を埋め込む --}}
@section('title', '新規作成')

@section('content')
    <div class="container">
        <div id="comment-form-post-{{ $post_form->id }}">
            <form action="/posts/{{ $post_form->id }}/comments" method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                    </div>
                </div>
                <input type="hidden" name="post_id" value="{{ $post_form->id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="投稿">
            </form>
        </div>
    </div>
@endsection