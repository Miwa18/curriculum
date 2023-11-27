@extends('layouts.layout')
@section('content')
@include('layouts/nav')

<div class="container">

<a href="{{route('shift.list')}}">シフト希望一覧へ</a>
</div>
@endsection
