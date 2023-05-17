@extends('template.master')
@section('main')
<div>
    <table>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>slug</th>
        </tr>
        @foreach ($roles as $role)
        
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{$role->slug}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection