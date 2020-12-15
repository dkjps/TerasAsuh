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

function buatTabelpelatihan() {
  var element = '<thead>' +
    '<tr>' +
    '<th style="width: 15%;" class="text-center">No</th>' +
    '<th style="width: 30%;" class="text-center">Nama pelatihan</th>' +
    '<th style="width: 30%;" class="text-center">Kapasitas</th>' +
    '<th style="width: ;" class="text-center">Aksi</th>' +
    '</tr>' +
    '</thead>' +
    '<tbody>' +
    '</tbody>';
  $(element).appendTo('#table-master-pelatihan');
}

function datatableMasterPelatihan() {
  $("#table-master-pelatihan").dataTable({
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
    "ajax": {
      "url": "./master-pelatihan/daftar-pelatihan",
      "dataSrc": function (response) {
        return response.data;
      }
    },
    "columns": [
      { "data": null },
      { "data": "nama" },
      { "data": "deskripsi" },
      { "data": null },
    ],
    "columnDefs": [{
      "targets": 0,
      "searchable": true,
      "orderable": false,
      "createdCell": function (td, cellData, rowData, row, col) {
        $(td).addClass('text-center');
        $(td).html(row + 1);
      }
    },
    {
      "targets": 1,
      "searchable": true,
      "orderable": false,
      "createdCell": function (td, nama, rowData, row, col) {
        $(td).addClass('text-center');
      }
    },
    {
      "targets": 2,
      "searchable": true,
      "orderable": false,
      "createdCell": function (td, cellData, rowData, row, col) {
        
      }
    },
    {
      "targets": 3,
      "searchable": false,
      "orderable": false,
      "createdCell": function (td, cellData, rowData, row, col) {
        var html = "<button type='button' class='btn btn-sm btn-primary'  onClick='detailPelatihan(" + rowData.id + ");' style='margin-left: 10px;'><i class='fas fa-pencil-alt' id='btn-edit-master-pelatihan'></i> Edit</button>";
        html += "<button class='btn btn-sm btn-danger' onClick='validasiDeletePelatihan(" + rowData.id + ");' style='margin-left: 10px;' id=''><i class='fas fa-trash'></i> Hapus</button>";
        $(td).html(html);
      }
    }]
  });
}

function validasiDeletePelatihan(id) {
  swal({
    title: 'Apakah anda yakin?',
    text: 'Ingin menghapus data dengan id ' + id.toString(),
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        // swal('Poof! Your imaginary file has been deleted!', {
        //   icon: 'success',
        // });
        var message = "";
        var status = false;
        jQuery.ajax({
          type: 'post',
          "url": "master-pelatihan/hapus-pelatihan",
          data: {
            id: id
          },
          dataType: 'json',
          success: function (response) {
            message = response.message.toString();
            status = response.data;
          },
          error: function (xhr, ajaxOptions, thrownError) {
            swal("Error!", 'Tekan "OK" untuk melanjutkan!', 'error');
          }, complete: function (response) {
            if (status == true) {
              swal(message.toString(), {
                icon: 'success',
              });
            }
            else {
              swal(message.toString(), 'Tekan "OK" untuk melanjutkan!', 'error');
            }
            $('#table-master-pelatihan').DataTable().ajax.reload();
          }
        });
      } else {
        //swal('Your imaginary file is safe!');
      }
    });
}

function validasiFormTambah() {
  var message = "";
  var status = false;

  var nama = $('#pelatihan-tambah-nama').val();
  var deskripsi = $('#pelatihan-tambah-deskripsi').val();
  if (!nama) {
    $('#pelatihan-tambah-nama').addClass('is-invalid');
  } else {
    $('#pelatihan-tambah-nama').removeClass('is-invalid');
  }
  if(!deskripsi){
    $('#pelatihan-tambah-deskripsi').addClass('is-invalid');
  } else{
    $('#pelatihan-tambah-deskripsi').removeClass('is-invalid');
  }
  if (nama && deskripsi) {
    //console.log(nama+" "+tipe)
    jQuery.ajax({
      type: 'post',
      "url": "master-pelatihan/tambah-pelatihan",
      data: {
        nama: nama,
        deskripsi: deskripsi
      },
      dataType: 'json',
      beforeSend: function () {
        $('#btn-pelatihan-add-submit').addClass('disabled');
        $('#btn-pelatihan-add-submit').addClass('btn-progress');
      },
      success: function (response) {
        message = response.message.toString();
        status = response.data;
        $('#pelatihan-tambah-nama').removeClass('is-invalid');
        $('#pelatihan-tambah-deskripsi').removeClass('is-invalid');
        $('#btn-pelatihan-add-submit').removeClass('disabled');
        $('#btn-pelatihan-add-submit').removeClass('btn-progress');
      },
      error: function (xhr, ajaxOptions, thrownError) {
        $('#pelatihan-tambah-nama').removeClass('is-invalid');
        $('#pelatihan-tambah-deskripsi').removeClass('is-invalid');
        $('#btn-pelatihan-add-submit').removeClass('disabled');
        $('#btn-pelatihan-add-submit').removeClass('btn-progress');
      }, complete: function (response) {
        $('#modal-pelatihan-tambah').modal('toggle');
        if (status == true) {
          swal(message.toString(), 'Tekan "OK" untuk melanjutkan!', 'success');
        }
        else {
          swal(message.toString(), 'Tekan "OK" untuk melanjutkan!', 'error');
        }
        $('#pelatihan-tambah-nama').val('');
        $('#pelatihan-tambah-deskripsi').val('');
        $('#table-master-pelatihan').DataTable().ajax.reload();
      }
    });
  }
}

function validasiFormEdit(){
  var message = "";
  var status = false;

  var nama = $('#master-pelatihan-edit-nama').val();
  var deskripsi = $('#master-pelatihan-edit-deskripsi').val();
  if (!nama) {
    $('#master-pelatihan-edit-nama').addClass('is-invalid');
  } else {
    $('#master-pelatihan-edit-nama').removeClass('is-invalid');
  }
  if(!deskripsi){
    $('#master-pelatihan-edit-deskripsi').addClass('is-invalid');
  } else{
    $('#master-pelatihan-edit-deskripsi').removeClass('is-invalid');
  }

  if (nama && deskripsi) {
    var id = $('#btn-pelatihan-edit-submit').val();
    jQuery.ajax({
      type: 'post',
      "url": "master-pelatihan/edit-pelatihan",
      data: {
        id: id,
        nama: nama,
        deskripsi: deskripsi
      },
      dataType: 'json',
      beforeSend: function () {
        $('#btn-pelatihan-edit-submit').addClass('disabled');
        $('#btn-pelatihan-edit-submit').addClass('btn-progress');
      },
      success: function (response) {
        message = response.message.toString();
        status = response.data;
        $('#master-pelatihan-edit-nama').removeClass('is-invalid');
        $('#master-pelatihan-edit-deskripsi').removeClass('is-invalid');
        $('#btn-pelatihan-edit-submit').removeClass('disabled');
        $('#btn-pelatihan-edit-submit').removeClass('btn-progress');
      },
      error: function (xhr, ajaxOptions, thrownError) {
        $('#master-pelatihan-edit-nama').removeClass('is-invalid');
        $('#master-pelatihan-edit-deskripsi').removeClass('is-invalid');
        $('#btn-pelatihan-edit-submit').removeClass('disabled');
        $('#btn-pelatihan-edit-submit').removeClass('btn-progress');
      }, complete: function (response) {
        $('#modal-pelatihan-edit').modal('toggle');
        if (status == true) {
          swal(message.toString(), 'Tekan "OK" untuk melanjutkan!', 'success');
        }
        else {
          swal(message.toString(), 'Tekan "OK" untuk melanjutkan!', 'error');
        }
        $('#table-master-pelatihan').DataTable().ajax.reload();
      }
    });
  }
}

function detailPelatihan(id) {
  jQuery.ajax({
    type: 'post',
    "url": "master-pelatihan/detail-pelatihan",
    data: {
      id: id
    },
    dataType: 'json',
    beforeSend: function () {
      swal('Tunggu Sebentar! Data anda sedang dalam proses', {
        buttons: false,
      });
    },
    success: function (response) {
      $('#btn-pelatihan-edit-submit').val(response.data[0].id);
      $('#master-pelatihan-edit-nama').val(response.data[0].nama);
      $('#master-pelatihan-edit-deskripsi').val(response.data[0].deskripsi);
      swal.close();
      $('#modal-pelatihan-edit').modal('toggle');
    },
    error: function (xhr, ajaxOptions, thrownError) {
      swal("Error!", 'Tekan "OK" untuk melanjutkan!', 'error');
    },
    complete:function(){
    }
  });
}

//JQUERY CODE
$(document).ready(function () {
  //buatTabelpelatihan();
  datatableMasterPelatihan();
  $("#btn-pelatihan-add-submit").click(function () {
    validasiFormTambah();
  });
  $("#btn-pelatihan-edit-submit").click(function () {
    validasiFormEdit();
  });
});