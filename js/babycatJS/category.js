$('input:radio[name="category"]').change(
    function(){
        if ($(this).is(':checked') ) {
            var html='';
            if ( $('input:radio[name="category"]').is(':checked') ) {
                var url=("/api/url?categoryID="+$(this).val());
            }



            $.get(url,(data,status)=>{
                $.each(data.data, function(index, value) {
                    html+='/baby-clothing/'+value.urltitle+'/?categoryName=' + value.name;
                });
                window.location.href = (html);
                $('.layer').css('border','1px solid #ed008c');
            });
        }
    }

);