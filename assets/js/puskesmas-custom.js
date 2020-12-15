/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */
//"use strict";

$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

//FORM UNTUK INPUT PASIEN PUSKESMAS
function submitFormPasien(){
    //console.log("fungsi form pasien masuk");
    var nama = $('#pasien_nama').val();
    var alamat = $('#pasien_alamat').val();
    var rt = $('#pasien_rt').val();
    var rw = $('#pasien_rw').val();
    var desa = $('#pasien_desa').val();
    var kecamatan = $('#pasien_kecamatan').val();
    var kota = $('#pasien_kota').val();
    var puskesmas = $('#pasien_puskesmas').val();
    var tanggal_lahir = $('#pasien_tanggal_lahir').val();
    var jenis_kelamin = $('#pasien_jenis_kelamin').val();
    var status_jkn = $('#pasien_status_jkn').val();
    var formData = $('#form-tambah-pasien').serializeObject();
    //console.log(getFormData($('#form-tambah-pasien').serializeArray()));
    addDataPasien(formData);
}

function addDataPasien(form){
    //console.log(JSON.stringify(form));
    jQuery.ajax({
        type: 'post',
        "url": "pasien-input",
        data: form,
        dataType : 'json',
        success: function (response) { 
           //console.log(response);
           alert(response.message);
           window.location.reload(); 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            
        }
    });
}

//FORM UNTUK INPUT PERAWATAN PUSKESMAS
function submitFormPerawatan(){
    console.log('Fungsi Form Perawatan masuk!');
    var formData = $('#form-tambah-perawatan').serializeObject();
    addDataPerawatan(formData);
}

function addDataPerawatan(form){
    //console.log(form);
    jQuery.ajax({
        type: 'post',
        "url": "perawatan-input",
        data: form,
        dataType : 'json',
        success: function (response) { 
           console.log(response);
        //    alert(response.message);
        //    window.location.reload(); 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            
        }
    });
}

//FORM UNTUK INPUT DOKTER PUSKESMAS
function submitFormDokter(){
    console.log('Fungsi Form Dokter Masuk!');
    var formData = $('#form-tambah-dokter').serializeObject();
    addDataDokter(formData);
}

function addDataDokter(form){
    //console.log(form);
    jQuery.ajax({
        type: 'post',
        "url": "dokter-input",
        data: form,
        dataType : 'json',
        success: function (response) { 
           console.log(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            
        }
    });
}

//FORM UNTUK INPUT PASUNG PUSKESMAS
function submitFormPasung(){
    console.log('Fungsi Form Pasung Masuk!');
    var formData = $('#form-tambah-pasung').serializeObject();
    addDataPasung(formData);
}

function addDataPasung(form){
    //console.log(form);
    jQuery.ajax({
        type: 'post',
        "url": "pasung-input",
        data: form,
        dataType : 'json',
        success: function (response) { 
           console.log(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            
        }
    });
}

//FORM UNTUK INPUT OBAT PUSKESMAS
function submitFormObat(){
    console.log('Fungsi Form Obat Masuk!');
    var formData = $('#form-tambah-obat').serializeObject();
    addDataObat(formData);
}

function addDataObat(form){
    //console.log(form);
    jQuery.ajax({
        type: 'post',
        "url": "obat-input",
        data: form,
        dataType : 'json',
        success: function (response) { 
           console.log(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            
        }
    });
}

var form = '<div class="col-12 col-md-9 col-lg-9">'+
    '<div class="form-group">'+
        '<select class="form-control test-select">'+
            '<option>Antihistamin</option>'+
            '<option>Antibiotik</option>'+
            '<option>Antidepresan</option>'+
        '</select>'+
    '</div>'+
'</div>'+
'<div class="col-12 col-md-3 col-lg-3">'+
    '<div class="form-group">'+
        '<input type="number" class="form-control" value="0" required="">'+
    '</div>'+
'</div>';

//JQUERY CODE
$(document).ready(function(){
    $('#btn-obat-add-form').click(function(){
        $(form).appendTo('#form-obat');
        $('select.test-select').select2();
    });
});