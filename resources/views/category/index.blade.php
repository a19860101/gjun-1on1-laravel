@extends('template.master')
@section('page-title')
分類管理
@endsection
@section('main')
    <div>
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div>
                <label for="">title</label>
                <input type="text" name="title">
            </div>

            <div>
                <label for="">slug</label>
                <input type="text" name="slug">
            </div>
            <input type="submit">
        </form>
    </div>
    <div>
        <table>
            <tr>
                <th>title</th>
                <th>slug</th>
            </tr>
            @foreach($categories as $category)
            
                <tr>
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <td><input type="text" name="title" value="{{$category->title}}"></td>
                        <td><input type="text" name="slug" value="{{$category->slug}}"></td>
                        <td><input type="submit" value="update"></td>
                    </form>
                    <form action="{{route('category.destroy',$category->id)}}" method="post">
                    <td>
                            @csrf 
                            @method('delete')
                            <input type="submit" value="delete">
                        </td>
                    </form>
                </tr>
            
            @endforeach
        </table>
    </div>
@endsection