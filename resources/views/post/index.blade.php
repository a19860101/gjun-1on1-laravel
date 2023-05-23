@extends('template.master')
@section('style')
   
@endsection
@section('main')
<x-title>hello post 123</x-title>
{{-- <a href="/post/create">新增文章</a> --}}
{{-- <a href="{{route('post.create')}}">新增文章</a> --}}

<div>
    @php
        $style = 'red';    
    @endphp
    <x-button type="submit" :style="$style">hello</x-button>
    <x-button type="reset" >hello</x-button>
    <x-button >hello</x-button>
    {{$text}}
    <a href="/test?id=123">test</a>
    {!!$text!!}
    @foreach($posts as $post)
    <h2>{{$post->title}}</h2>
    <div>author:{{$post->user->name}}</div>
    <img src="/images/{{$post->cover}}" alt="">
    <div>tag: {{$post->tagStr()}}</div>
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
