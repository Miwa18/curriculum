@extends('layouts.layout')
@section('content')
@include('layouts.nav')
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">シフト登録Form</h3>
            <form method="POST" action="{{route('shift.request')}}">
              @csrf
              <div class="row">
                <div class="col-12">
                <label class="form-label select-label">勤務日数</label>
                    <select name="type_id" class="select form-control-lg">
                    <option value="1" disabled>勤務日数を選択</option>
                    @foreach($types as $type)
                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12" style="width:70%">
                <p></p>
                <p>希望する休みの日を以下に選択してください。</p>
                <input type="text" name="date" id="datepickr" />
                <div class="col-12">
                <textarea class="form-control" id="textAreaExample1" rows="4" name="comment">コメント</textarea>
                </div>
              </div>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="登録" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <script>
    flatpickr('#datepickr',
    { locale:"ja",
      dateFormat:"Y-m-d",
      mode:"multiple",
    });
</script>
@endsection
