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
    <br>
    <small>{{$post->updated_at}}</small>
    <div>
        {{$post->body}}
    </div>
    <form action="/post/{{$post->id}}" method="post">
    {{-- <form action="{{route('post.destroy',$post->id)}}" method="post"> --}}
        @csrf
        @method('delete')
        <input type="submit" value="刪除" onclick="return confirm('確認刪除?')">
    </form>
    <a href="/post/{{$post->id}}/edit">編輯</a>
    <a href="{{route('post.edit',$post->id)}}">編輯</a>
</body>
</html>