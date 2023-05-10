@extends('template.master')
@section('main')
    <h1>Edit Post</h1>
    {{-- <form action="/post/{{$post->id}}" method="post"> --}}
    <form action="{{route('post.update',$post->id)}}" method="post">
        @csrf
        @method('put')
        <div>
            <input type="text" name="title" value="{{$post->title}}">
        </div>
        <div>
            @php
            $tagArray=[];
            foreach($post->tags as $tags){
                $tagArray[] = $tags->title;
            }
            $tagStr = implode(',',$tagArray);
            @endphp
            <input type="text" name="tag" value="{{$tagStr}}">
        </div>
        <div>
            <textarea name="body" id="" cols="30" rows="10">{{$post->body}}</textarea>
        </div>
        <input type="submit">
    </form>
</body>
</html>
@endsection