@extends('layouts.layout')
@section('content')
@include('layouts/nav')

<div class="text-center">
<div class="list-group list-group-light">
  <a href="{{route('shift.list')}}" class="list-group-item list-group-item-action px-3 border-0 active" aria-current="true">
  シフト希望一覧へ</a>
    <form method="POST" action="#">
    @csrf
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
    <div class="form-check  mb-4 col-md-6">
        <label class="form-label" for="customFile">画像を添付</label>
        <input type="file" class="form-control" id="customFile" name="image" />
    </div>
    <button type="submit" class="btn btn-primary">作成資料のアップロード</button>
    </form>
</div>
@endsection
