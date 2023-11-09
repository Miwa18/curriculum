
let nowCount =3;

$('.past').on('click',function(){
        const nowCount = 3; 
        $.ajax({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            url: "{{route('postAj')}}",
        type: "POST",
        dataType: "json",
        data:{nowCount:nowCount},
        })
        .done(function(data){
            data.forEach(function(postData){
                alert("success");
                var cardHtml = 
                `<div class="card-body">
                <p>${postData.date}
                <a href="/post_delete/${postData.id}" onclick="return confirm('本当に削除しますか？')">削除</a>
                </p>
                <h5 class="card-title">${postData.title}</h5>
                  <p class="card-text">${postData.text}</p>
                  <p class="card-text">
                  ${postData.image !== "" ? `<img src="${postData.image}" class="card-img-bottom" alt="写真" width="30%">` : ''}
                  </p>
                </div>`;
        
            $('#postScroll').append(cardHtml);
            });
            nowCount += 3;
        })
        .fail(function(XMLHttpRequest,textStatus,errorThrown){
            alert(errorThrown);
        });
});
