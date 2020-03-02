
////planID
$('input:radio[name="plan"]').change(
    function(){
        if ($(this).is(':checked') ) {
            var html='';
            if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
            }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="subcat"]').is(':checked') ) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
            }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else if ($('input:radio[name="subcat"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
            }else if ($('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val() );
            }else if ( $('input:radio[name="subcat"]').is(':checked') ) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&subcatID="+$('input:radio[name="subcat"]:checked').val());
            }else if ($('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
            }else if ($('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else {
                var url=("/api/filter?planID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
            }

            $('#plan').html($( this ).attr( "data-planName" ));
            sendRequest(url);
        }
    }
);
