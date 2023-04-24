<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Post</h1>
    {{-- <form action="/post/{{$post->id}}" method="post"> --}}
    <form action="{{route('post.update',$post->id)}}" method="post">
        @csrf
        @method('put')
        <div>
            <input type="text" name="title" value="{{$post->title}}">
        </div>
        <div>
            <textarea name="body" id="" cols="30" rows="10">{{$post->body}}</textarea>
        </div>
        <input type="submit">
    </form>
</body>
</html>