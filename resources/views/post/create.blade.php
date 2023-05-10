@extends('template.master')
@section('main')
    <h1>Create Post</h1>
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <div>
            <input type="text" name="title" class="@error('title') is-valid @enderror" value="{{old('title')}}">
            @error('title') {{$message}} @enderror
        </div>
        <div>
            <label for="">分類</label>
            <select name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Tag</label>
            <input type="text" name="tag">
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
    @endsection