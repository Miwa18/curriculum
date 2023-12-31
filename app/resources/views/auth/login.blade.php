@extends('layouts.layout')
@section('content')
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="/images/draw2.png" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $message)
                <p>{{$message}}</p>
            @endforeach
        </div>
        @endif
        <form action="{{route('login')}}" method="POST" autocomplete="on">
            @csrf
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" autocomplete="email" value="{{old('email')}}"/>
            <label class="form-label" for="form1Example13">メールアドレス</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
            <label class="form-label" for="form1Example23">パスワード</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
        

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">サインイン</button>

        </form>
      </div>
      <a href="{{route('password.request')}}" class="text-body">パスワードを忘れた</a>
    </div>
  </div>
</section>
@endsection