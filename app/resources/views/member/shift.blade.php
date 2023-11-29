@extends('layouts.layout')
@section('content')
@include('layouts/nav')
<label for="year">西暦 年:</label>
    <select name="year" id="year">
        @for($i = date('Y')+1; $i >= 2000; $i --)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>
    <label for="month">月:</label>
    <select name="month" id="month">
        @for($i = 1; $i <= 12; $i++)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>

@endsection
