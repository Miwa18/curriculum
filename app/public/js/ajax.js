const element =document.getElementById('postScroll');
element.onscroll = function(){
    if(element.scrollTop + element.clientHeight === element.scrollHeight){
        const nowCount = 3; 
        $.ajax({
            url: "/post/ajax",
        type: "POST",
        dataType: "json",
        data:{nowCount:nowCount},
        })
        .done(function(data){
            data.data.forEach(function(postData){
                var cardHtml = `<div class="card-body">
                <h5 class="card-title">${postData.title}</h5>
                  <p class="card-text">${postData.text}</p>
                  <img src="{${postData.image}" class="card-img-bottom" alt="写真" width="30%" />
              </div>`;
        
            $('#postScroll').append(cardHtml);
            });
        })
        .fail(function(XMLHttpRequest,textStatus,errorThrown){
            alert(errorThrown);
        })

}
};