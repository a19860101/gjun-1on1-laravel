<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .is-valid {
            border-color: red;
        }
    </style>
</head>
<body>
    <h1>Create Post</h1>
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div>
            <input type="text" name="title" class="@error('title') is-valid @enderror" value="{{old('title')}}">
            @error('title') {{$message}} @enderror
        </div>
        <div>
            <textarea name="body" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="submit">
    </form>
    @if($errors->any())
        @foreach($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
    @endif
</body>
</html>