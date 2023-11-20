@extends('layouts.layout')
@section('content')
<div class="container">
    <h1>パスワードリセット<h1>
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <form method="POST" action="{{route('password.update')}}">
            @csrf
            <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" />
                      <label class="form-label" for="form3Example4c">新しいパスワード</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="password_confirmation" />
                      <label class="form-label" for="form3Example4cd">パスワード（確認用）</label>
                    </div>
                  </div>
            
                  <button type="submit">パスワードをリセット</button>
        </form>
</div>
@endsection
