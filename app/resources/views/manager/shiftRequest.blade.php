@extends('layouts.layout')
@section('content')
@include('layouts/nav')
<div>
<p>ユーザー名を入力して検索できます。</p>
  <p>全ユーザーの情報を表示する場合は、下記は入力しないでください。</p>
</div>
<form id="searchForm" action="{{route('list.search')}}" method="POST">
  @csrf
  <div class="form-outline mb-4" data-mdb-input-init>
    <input type="text" class="form-control" id="datatable-search-input">
    <label class="form-label" for="datatable-search-input">ユーザー検索</label>
  </div>
  <div>
    <label for="">日付検索</label>
    <input type="date" name="from" placeholder="from_date" value="{{$from ?? ''}}">
    <span class="mx-3">~</span>
    <input type="date" name="until" placeholder="until_date" value="{{$until ?? ''}}">
    <p>作成した期間で検索されます。</p>
  </div>
    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
      <i class="fas fa-search"></i>
    </button>
</form>
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>名前</th>
      <th>勤務日数</th>
      <th>休み希望日</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <div id="datatable">
    
  </div>
  </tr>
  </tbody>
</table>

<script>
$(document).ready(function(){
  $('#searchForm').submit(function(e){
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      type:'POST',
      url:'{{route("list.search")}}',
      data:formData,
      success:function(data){
        listResults(data.results);
      },
      error:function(error){
        console.log(error);
      }
    });
  });

function listResults(results){
  var datatable = $('#datatable');
  results.foreach(function(result){
    datatable.append('<th>'+result.name+'</th>'+'<th>'+result.type_id+'</th>'+'<th>'+result.data+'</th>');
  });
}
});
</script>

@endsection
