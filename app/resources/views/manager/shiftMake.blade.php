@extends('layouts.layout')
@section('content')
@include('layouts/nav')

<div class="text-center">
<div class="list-group list-group-light">
  <a href="{{route('shift.list')}}" class="list-group-item list-group-item-action px-3 border-0 active" aria-current="true">
  シフト希望一覧へ</a>
    <h5> 作成したシフトを投稿 </h5>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                    <p>{{$message}}</p>
                @endforeach
            </div>
        @endif
    <div class="d-flex justify-content-center">
        <form method="POST" action="{{route('shift.post')}}" enctype="multipart/form-data" >
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
        <div class="form-check  mb-4">
            <label class="form-label" for="customFile">資料を登録</label>
            <input type="file" class="form-control" id="customFile" name="shiftfile" />
        </div>
            <button type="submit" class="btn btn-primary">作成資料のアップロード</button>
        </form>
    </div>
    <p>※資料はpdf形式で登録してください。</p>
</div>
@endsection
