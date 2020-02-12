jQuery('#show').change(()=>{
    var html='';
    var url=("/api/limit/"+jQuery('#show').val());
    $.get(url,(data,status)=>{



        $.each(data.data, function(index, value) {
            var text=value.name;
            text=text.replace(/ /g, "-");

            html+='<div class="item" >';
            html+=' <div class="details-item"> ';
            html+=' <a target="_blank" href="/product/'+text+'/">';
            html+='<img src="/'+value.image+'">';
            html+='<div class="text">';
            html+=' <h3 class="title">'+value.name+'</h3>     ';
            if(value.count==1 ){
                html+=' <div class="price-item d-flex " > ';
                html+='<span class="price" style="color: #ababab;font-size: 1.286rem;line-height: 1.222;font-weight: 400;margin-top: 20px;"> ـــــــــــــــــــــ  ناموجود   ــــــــــــــــــــــ</span> ';
                html+='</div>  ';
            }else{
                if(value.offer!=null ){
                    html+=' <div class="price-item d-flex " >';
                    html+='<del class="price-deleted" style="color:#5e5e5e!important;">'+ToRial(value.price)+'</del>';
                    html+='<span class="price"> ';
                    html+='<label class="badge off" style="border-radius:5px!important;top:0px!important;width:80px!important;height:30px!important;">'+value.offer+'%</label>';
                    html+=' </span>';
                    html+='</div> ';
                    html+=' <span class="price" style="color:#ed008c!important;"> '+ToRial(value.price)+'هزار تومان</span>';
                }else{
                    html+=' <span class="price">  '+ToRial(value.price)+'  تومان </span>';
                }
            }
            html+=' </div>';
            html+=' </a>';
            html+='</div>';
            html+='</div>';
        });

        $('#product-content').html(html);
        // $('#pagenum').html(' ');
        ConvertNumberToPersion();

    });
});