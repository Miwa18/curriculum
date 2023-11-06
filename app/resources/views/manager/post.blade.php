@extends('layouts.layout')
@section('content')
@include('layouts/nav')
<section class="vh-100 gradient-custom">
<div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">投稿作成</h3>
                    @if($errors->any())
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                            <p>{{$message}}</p>
                        @endforeach
                        </div>
                    @endif
                    <form action="{{route('post')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                        <!-- Date input -->
                        <div class="form-outline mb-4">
                            <input type="date" id="form4Example1" class="form-control" name="date" value="{{old('date')}}" />
                            <label class="form-label" for="form4Example1">日付</label>
                        </div>

                        <!-- title input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example2" class="form-control" name="title" value="{{old('title')}}" />
                            <label class="form-label" for="form4Example2">タイトル</label>
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form4Example3" rows="4" name="text" >{{old('text')}}</textarea>
                            <label class="form-label" for="form4Example3">コメント</label>
                        </div>

                        <!-- image input -->
                        <div class="form-check  mb-4">
                            <label class="form-label" for="customFile">画像を添付</label>
                            <input type="file" class="form-control" id="customFile" name="image" />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">投稿</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
