@extends('layouts.layout')
@section('content')
@include('layouts/nav')
<div class="list-group list-group-light">
    <h5> 確認したいシフトの年・月を選択してください。 </h5>
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                    <p>{{$message}}</p>
                @endforeach
            </div>
        @endif
        <form id="shiftview">
            @csrf
            <label for="year">西暦 年:</label>
            <select name="year" id="year">
                @for($i = date('Y')+1; $i >= 2000; $i --)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <label for="month">月:</label>
            <select name="month" id="month">
                @for($i = 1; $i <= 12; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <button type="submit" class="btn btn-primary">シフト表示</button>
        </form>
</div>
<div id="resultshift">

</div>

<script>
$(document).ready(function(){
  $('#shiftview').submit(function(e){
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      type:'POST',
      url:'{{route("shift.search")}}',
      data:formData,
      dataType:'json',
      success:function(data){
        if(data.result){
        shiftResults(data.result);
        }else{
          $('#resultshift').append('<p>記録がありませんでした。</p>');
        }
      },
      error:function(xhr,status,error){
        if(xhr.status === 404){
          $('#resultshift').append('<p>記録がありませんでした。</p>');
        }else{
          $('#resultshift').append('<p>エラーが発生しました。</p>');
          console.log('エラーが発生しました。:',error);
        }
      }
    });
  });

function shiftResults(result){
  var datatable = $('#resultshift');
  datatable.empty();
  if(result){
    var pdfPath = result;
    var html = '<embed src="'+pdfPath+'" type="application/pdf" width="100%" height="600px" >';
    datatable.append(html);
    }else{
    datatable.append('<p>データがまだありません。</p>');
    console.log(result);
  }
};
});
</script>

@endsection
