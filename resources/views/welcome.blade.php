@extends('template.master')
@section('main')
<h1>welcome</h1>
@auth
<div>會員您好</div>
@else
<div>訪客您好</div>
@endauth

@guest
<div>訪客您好</div>
@endguest

@endsection