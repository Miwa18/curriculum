@extends('layouts.layout')
@section('content')
@include('layouts.nav')
<div class="text-center">
<div class="list-group list-group-light">
  <a href="/shift/user/create" class="list-group-item list-group-item-action px-3 border-0 active" aria-current="true">
    従業員登録へ</a>
  <a href="#" class="list-group-item list-group-item-action px-3 border-0">従業員編集・削除</a>
  <a href="#" class="list-group-item list-group-item-action px-3 border-0">シフト作成</a>
  <a href="{{route('post.create')}}" class="list-group-item list-group-item-action px-3 border-0">お知らせ投稿作成へ</a>
  <div class="card mb-3 w-50 mx-auto" id="scrollable">
    <h5>お知らせ</h5>
    @foreach($postDatas as $postData)
    @if($postData)
    <div class="card-body">
      <h5 class="card-title">{{$postData['title']}}</h5>
        <p class="card-text">{{$postData['text']}}</p>
      <p class="card-text">
      <img src="{{$postData['image']}}" class="card-img-bottom" alt="写真"/>
    </div>
    @endif
    @endforeach
  </div>
</div>
</div>

@endsection