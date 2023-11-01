@extends('layouts.layout')
@section('content')
@include('layouts.nav')
<div class="text-center">
@if(session('message'))
    <div class="alert alert-success">
      {{session('message')}}
    </div>
    @endif

<div class="list-group list-group-light">
  <a href="{{route('member')}}" class="list-group-item list-group-item-action px-3 border-0 active" aria-current="true">
    従業員登録へ</a>
  <a href="#" class="list-group-item list-group-item-action px-3 border-0">従業員編集・削除</a>
  <a href="#" class="list-group-item list-group-item-action px-3 border-0">シフト作成</a>
  <a href="#" class="list-group-item list-group-item-action px-3 border-0">お知らせ投稿作成へ</a>
  <a class="list-group-item list-group-item-action px-3 border-0 disabled">投稿内容</a>
</div>
</div>

@endsection