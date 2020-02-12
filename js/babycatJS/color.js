////colorID
$('input:radio[name="color"]').change(
    function(){
        if ($(this).is(':checked') ) {
            var html='';
            if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
            }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
            }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="plan"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val() );
            }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val() );
            }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
            }else if ($('input:radio[name="plan"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
            }else if ($('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else {
                var url=("/api/filter?colorID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
            }

            sendRequest(url);
        }
    }
);