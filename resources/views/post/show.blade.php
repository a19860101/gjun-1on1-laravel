<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>{{$post->title}}</h2>
    <small>{{$post->created_at}}</small>
    <div>
        {{$post->body}}
    </div>
    <form action="/post/{{$post->id}}" method="post">
    {{-- <form action="{{route('post.destroy',$post->id)}}" method="post"> --}}
        @csrf
        @method('delete')
        <input type="submit" value="刪除">
    </form>
</body>
</html>