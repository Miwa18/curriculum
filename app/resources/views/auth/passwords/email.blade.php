@extends('layouts.layout')
@section('content')
@include('layouts.nav')
<div class="container" style="margin-top:10px;">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>パスワードリセットメールの送信</h5>
            </div>
            <div class="card-body">
                <h6>メールアドレスを入力してください。</h6>
                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
                @endif
                <form method="POST" action="{{route('password.email')}}">
                    @csrf       
                    <div class="form-group row">
                        <input type="email" id="typeEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required autocomplete="email"/>
                        <label class="form-label" for="typeEmail"></label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            パスワードリセットメールを送信
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection