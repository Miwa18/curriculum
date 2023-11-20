@extends('layouts.layout')
@section('content')

<div class="container">
    <h1>パスワードリセットメールが送信されました。</h1>
    <p>送信されたメールを確認して、添付されたリンクからパスワードのリセットを行ってください。</p>
</div>

<a href="{{route('login')}}">ログインページへ</a>
@endsection
