/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */
//"use strict";

// function pasienDataTable(){
//     //test output json
//     jQuery.ajax({
//         type: 'get',
//         "url": "daftar-pasien",
//         dataType : 'json',
//         success: function (response) { 
//            console.log(response);
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
            
//         }
//     });
// }

function datatableTest(){
    $("#table-master-panitia").dataTable({
      "language": {
        "emptyTable": "Data tidak tersedia",
        "zeroRecords": "Tidak ada data yang ditemukan",
        "infoFiltered": "",
        "infoEmpty": "",
        "paginate": {
            "previous": '‹',
            "next": '›'
        },
        "info": "Menampilkan _START_ - _END_ dari _TOTAL_ Tabel",
        "aria": {
            "paginate": {
                "previous": 'Previous',
                "next": 'Next'
            }
        }
      },
      "columnDefs": [
          { "sortable": true, "targets": [0,2,3] }
        ]
      });
  } 
  
  //JQUERY CODE
  $(document).ready(function(){
      datatableTest();
      // $('.picker-month').MonthPicker({ 
      //     MonthFormat: 'M, yy',
      //     Button: false 
      // });
  });