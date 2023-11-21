@extends('layouts.layout')
@section('content')
@include('layouts.nav')
<div class="col-xl-6 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="ms-3">
              <p class="fw-bold mb-1">名前：{{$user->name}}</p>
              <p class="fw-bold mb-1">フリガナ：{{$user->kana}}</p>
            <p class="fw-bold mb-1">電話番号:{{$user->phone}}</p>
              <p class="fw-bold mb-1">メールアドレス:{{$user->email}}</p>
            </div>
          </div>
        <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
          <a
            class="btn btn-link m-0 text-reset"
            href="/info_edit"
            role="button"
            data-ripple-color="primary"
            >ユーザー情報編集</a>
          <a
            class="btn btn-link m-0 text-reset"
            href="{{route('password.request')}}"
            role="button"
            data-ripple-color="primary"
            >パスワード変更</a>
        </div>
        </div>
      </div>
    </div>
</div>
@endsection