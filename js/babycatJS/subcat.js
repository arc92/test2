////subcatID
$('input:radio[name="subcat"]').change(
    function(){
        if ($(this).is(':checked') ) {
            var html='';
            if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
            }else if ( $('input:radio[name="category"]').is(':checked') && $('input:radio[name="plan"]').is(':checked') ) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
            }else if ($('input:radio[name="category"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="category"]:checked').val()+ "&name="+$('input:radio[name="size"]:checked').val());
            } else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked') && $('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else if ($('input:radio[name="plan"]').is(':checked') && $('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val()+"&colorID="+$('input:radio[name="color"]:checked').val() );
            }else if ( $('input:radio[name="plan"]').is(':checked') ) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&planID="+$('input:radio[name="plan"]:checked').val());
            }else if ($('input:radio[name="color"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&colorID="+$('input:radio[name="color"]:checked').val());
            }else if ($('input:radio[name="size"]').is(':checked')) {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val()+"&name="+$('input:radio[name="size"]:checked').val());
            }else {
                var url=("/api/filter?subcatID="+$(this).val()+"&categoryID="+$('input:radio[name="catproduct"]').val());
            }
            $('#gender').html($( this ).attr( "data-genderName" ));
            sendRequest(url);


        }
    }
);