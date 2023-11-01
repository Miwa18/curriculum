@extends('layouts.layout')
@section('content')
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">新規登録</p>
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{$message}}</p>
                    @endforeach
                </div>
                @endif
                <form class="mx-1 mx-md-4" action="{{route('new.registration')}}" method="POST">
                @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example1c" class="form-control" name="name" />
                            <label class="form-label" for="form3Example1c">名前</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example1c" class="form-control" name="kana" />
                            <label class="form-label" for="form3Example1c">フリガナ</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="tel" id="typePhone" class="form-control" name="phone" />
                            <label class="form-label" for="typePhone">電話番号</label>
                        </div>
                    </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="email" />
                      <label class="form-label" for="form3Example3c">メールアドレス</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="password" />
                      <label class="form-label" for="form3Example4c">パスワード</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="password_confirmation" />
                      <label class="form-label" for="form3Example4cd">パスワード（確認用）</label>
                    </div>
                  </div>

                  <input type="hidden" name="role" value="1" />
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">登録</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection