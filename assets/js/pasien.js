function pasienDataTable(){
    //test output json
    jQuery.ajax({
        type: 'get',
        "url": "daftar-pasien",
        dataType : 'json',
        success: function (response) { 
           console.log(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            
        }
    });
}

//JQUERY CODE
$(document).ready(function(){
    pasienDataTable();
});