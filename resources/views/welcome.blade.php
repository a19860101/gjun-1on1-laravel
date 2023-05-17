@extends('template.master')
@section('main')
<h1>welcome</h1>
@auth

@can('admin')
    <div>admin</div>
@else
    <div>member</div>
@endcan

{{-- @can('member')
    <div>member</div>
@endcan --}}

<div>會員您好</div>
@else
<div>訪客您好</div>
@endauth

@guest
<div>訪客您好</div>
@endguest

@endsection