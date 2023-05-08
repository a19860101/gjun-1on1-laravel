@extends('template.master')
@section('style')
    <style>
        body {
            color: yellow;
        }
    </style>
@endsection
@section('main')
<h1>hello Post </h1>
{{-- <a href="/post/create">新增文章</a> --}}
{{-- <a href="{{route('post.create')}}">新增文章</a> --}}

<div>
    {{$text}}
    {!!$text!!}
    @foreach($posts as $post)
    <h2>{{$post->title}}</h2>
    <div>{{$post->category->title}}</div>
    <small>{{$post->created_at}}</small>
    <div>
        {{ strip_tags($post->body) }}
        <a href="/post/{{$post->id}}">繼續閱讀</a>
        <a href="{{route('post.show',['post' => $post->id])}}">繼續閱讀</a>
        {{-- <a href="{{route('post.show',$post->id)}}">繼續閱讀</a> --}}
    </div>
    @endforeach
</div>
@endsection
