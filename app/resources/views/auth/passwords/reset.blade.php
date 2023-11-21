@extends('layouts.layout')
@section('content')
<div class="container">
    <h1>パスワードリセット</h1>
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="row justify-content-center">
        <form method="POST" action="{{route('password.update')}}">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <div class="row">
              @error('email')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
              <label for="email" >メールアドレス</label>
              <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$email ?? old('email')}}" required autocomplete="email">
            </div>
            <div class="row">
              <label for="password">新しいパスワード</label>
              <input type="password" id="password" name="password" required />
              @error('password')
                <span class="error" style="color:red;">{{$message}}</span>
              @enderror            
            </div>
            <div class="row">
              <label for="password_confirmation">パスワード（確認用）</label>
              <input type="password" id="password_confirmation" name="password_confirmation" required />
              @error('password_confirmation')
                <span class="error" style="color:red;">{{$message}}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">パスワードをリセット</button>
        </form>
        </div>
</div>
@endsection
