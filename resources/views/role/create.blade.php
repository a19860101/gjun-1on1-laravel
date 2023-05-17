@extends('template.master')
@section('main')
<div>
    <h2>建立權限</h2>
    <form action="{{route('role.store')}}" method="post">
        @csrf
        <div>
            <label for="">名稱</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">slug</label>
            <input type="text" name="slug">
        </div>
        <input type="submit" value="create role">
    </form>
</div>
@endsection