function datatableMasterKeluargaBinaan() {
    $("#table-master-keluarga-binaan").dataTable({
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
        "url": "./master-keluarga-binaan/daftar-keluarga-binaan",
        "dataSrc": function (response) {
            console.log(response)
          return response.data;
        }
      },
      "columns": [
        { "data": null },
        { "data": "namalengkap" },
        { "data": "email" },
        { "data": "nohp" },
        { "data": "jenis_kelamin" },
        { "data": "tgl_lahir" },
        { "data": "nama_provinsi" },
        { "data": "nama_kota" },
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
        "targets": 4,
        "searchable": true,
        "orderable": false,
        "createdCell": function (td, cellData, rowData, row, col) {
            $(td).addClass('text-center');
            var html;
            if(rowData.jenis_kelamin == 0){
            html = '<p>Pria</p>'
            }
            else if(rowData.jenis_kelamin == 1){
            html = '<p>Wanita</p>'
            }
            $(td).html(html);
        }
      },
      {
        "targets": 8,
        "searchable": false,
        "orderable": false,
        "createdCell": function (td, cellData, rowData, row, col) {
          var html = "<button type='button' class='btn btn-sm btn-primary disabled'   style='margin-left: 10px;'><i class='fas fa-pencil-alt' id=''></i> Edit</button>";
          html += "<button class='btn btn-sm btn-danger disabled'  style='margin-left: 10px;' id=''><i class='fas fa-trash'></i> Hapus</button>";
          $(td).html(html);
        }
      }]
    });
  }

$(document).ready(function () {
    //buatTabelpelatihan();
    datatableMasterKeluargaBinaan();
   
  });