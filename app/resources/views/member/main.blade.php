@extends('layouts.layout')
@section('content')
@include('layouts.nav')
<div class="text-center">
<div class="list-group list-group-light">
  <a href="#" class="list-group-item list-group-item-action px-3 border-0">シフト希望提出</a>
  <a href="#" class="list-group-item list-group-item-action px-3 border-0">シフト確認へ</a>
  <div class="card mb-3 w-75 mx-auto" id="postScroll" >
    <h5>お知らせ</h5>
    <div id="dataMenu">
      @if($postDatas ?? '')
      @foreach($postDatas as $postData)
      <div class="card-body">
        <p>{{$postData['date']}}</p>
        <h5 class="card-title">{{$postData['title']}}</h5>
          <p class="card-text">{{$postData['text']}}</p>
        <p class="card-text">
          @if($postData['image'] !=='')
            <img src="{{\Storage::url($postData['image'])}}" class="card-img-bottom" alt="写真" width="30%" />
          @endif
        </div>
      @endforeach
      @endif
    </div>
    <input type="hidden" id="count" value="3">
    <button type="button" class="btn btn-info" id="past">以前の投稿</button>
  </div>

<script type="text/javascript">
  $('#past').on('click',function(){
    var nowCount = $("#count").val();
      $.ajax({
          headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
          url: "{{route('postAj')}}",
          type: "POST",
          dataType: "json",
          data:{nowCount:nowCount},
          })
        .done(function(data){
          data.post.forEach(function(postData){
              var cardHtml = 
              `<div class="card-body">
              <p>${postData.date}</p>
              <h5 class="card-title">${postData.title}</h5>
                <p class="card-text">${postData.text}</p>
                <p class="card-text">
                  ${postData.image !== "" ? `<img src="/storage/app/public/items/${postData.image}" class="card-img-bottom" alt="写真" width="30%">` : ''}
                </p>
              </div>`;
            $('#dataMenu').append(cardHtml);
            nowCount += 3;
            $("#count").val(nowCount);
          });
        })
        .fail(function(XMLHttpRequest,textStatus,errorThrown){
            alert(errorThrown);
        });
  });
</script>


</div>
</div>
@endsection