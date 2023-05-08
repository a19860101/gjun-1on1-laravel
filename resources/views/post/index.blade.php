@extends('template.master')

@section('main')
<h1>hello Post </h1>
{{-- <a href="/post/create">新增文章</a> --}}
{{-- <a href="{{route('post.create')}}">新增文章</a> --}}

<div>
    @foreach($posts as $post)
    <h2>{{$post->title}}</h2>
    <div>{{$post->category->title}}</div>
    <small>{{$post->created_at}}</small>
    <div>
        {{ $post->body }}
        <a href="/post/{{$post->id}}">繼續閱讀</a>
        <a href="{{route('post.show',['post' => $post->id])}}">繼續閱讀</a>
        {{-- <a href="{{route('post.show',$post->id)}}">繼續閱讀</a> --}}
    </div>
    @endforeach
</div>
@endsection
