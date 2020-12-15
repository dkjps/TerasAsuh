function datatableMasterKader() {
    $("#table-master-kader").dataTable({
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
        "url": "./master-kader/daftar-kader",
        "dataSrc": function (response) {
            console.log(response)
          return response.data;
        }
      }
    });
  }

$(document).ready(function () {
    //buatTabelpelatihan();
    datatableMasterKader();
   
  });