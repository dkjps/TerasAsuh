<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemateriJadwal extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    $this->dateToday = date("Y-m-d");
    $this->timeToday = date("h:i:s");
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "jadwal";
		$data['title'] = "Jadwal Pemateri";
		$data['deskripsi'] = "Daftar pelatihan TerasAsuh";

		$jadwal = $this->GeneralApiModel->getWhereTransactionalOrdered(array('id_panitia'=>$_SESSION['id']), 'tgl_buka_materi','ASC', 'detail_kelas_pemateri')->result();
		$list_jadwal = array();
		$color = '';
		foreach ($jadwal as $j) {
			if(strtotime($j->tgl_buka_materi) < time()) {
				$color = '#92ED8E';
   		} else {
				if (empty($j->link_meet)) {
					$color = '#FB6350';
				} else {
					$color = '#000';
				}
   		}
			array_push($list_jadwal, array('title'=>$j->judul_materi, 'start'=>$j->tgl_buka_materi, 'color'=>$color ,'url'=>base_url("PemateriJadwal/detailJadwal/$j->id_materi/$j->id_jadwal")));
		}

		$data['jadwal'] = $list_jadwal;
		$this->template->views('pemateri_jadwal/pemateri_home', $data);
	}

	public function detailJadwal($id_materi, $id_jadwal) {
		$data['page'] = "jadwal";
		$data['title'] = "Detail Jadwal";

		$data['submateri'] = $this->GeneralApiModel->getWhereMaster(array('id_materi'=>$id_materi),'detail_sub_materi')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_jadwal'=>$id_jadwal), 'detail_kelas_pemateri')->row();
		$this->template->views('pemateri_jadwal/pemateri_editJadwal', $data);
	}

	public function ubahJadwal($id_jadwal){
		$data['link_meet'] = $_POST['link'];
		$data['password_meet'] = $_POST['password'];
		$where['id'] = $id_jadwal;
		$this->GeneralApiModel->updateTransactional($data, $where,'transactional_jadwal');
		redirect("PemateriJadwal/");
	}
	// public function tambahPelatihan(){
	// 	if (isset($_POST['submit'])) {
	// 		$data['nama'] = $_POST['nama'];
	// 		$data['deskripsi'] = $_POST['deskripsi'];
	// 		$result = $this->GeneralApiModel->insertMaster($data, 'masterdata_pelatihan');
	// 		if ($result) {
	// 			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Pelatihan Sukses</div>');
	// 			redirect(base_url("pelatihan"));
	// 		}
	// 	}
	// 	$data['page'] = "pelatihan";
	// 	$data['action'] = "tambah";
	// 	$data['judul'] = "Tambah Pelatihan";
	// 	$data['deskripsi'] = "Tambah data pelatihan TerasAsuh sesuai kebutuhan";
	//
	// 	$this->template->views('pelatihan/pelatihan_add', $data);
	// }
	//
	// public function ubahPelatihan($id){
	// 	if (isset($_POST['submit'])) {
	// 		$data['nama'] = $_POST['nama'];
	// 		$data['deskripsi'] = $_POST['deskripsi'];
	// 		$where['id'] = $id;
	// 		$result = $this->GeneralApiModel->updateMaster($data, $where,'masterdata_pelatihan');
	// 		if ($result) {
	// 			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Ubah Pelatihan Sukses</div>');
	// 			redirect(base_url("pelatihan"));
	// 		}
	// 	}
	// 	$data['action'] = "ubah";
	// 	$data['page'] = "pelatihan";
	// 	$data['detail'] = $this->GeneralApiModel->getWhereMaster(array('id'=>$id),'masterdata_pelatihan')->row();
	// 	$data['judul'] = "Ubah Pelatihan";
	// 	$data['deskripsi'] = "Ubah data pelatihan TerasAsuh sesuai kebutuhan";
	//
	// 	$this->template->views('pelatihan/pelatihan_add', $data);
	// }
	//
	// public function hapusPelatihan($id){
	// 	$where['id'] = $id;
	// 	$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_pelatihan');
	// 	if ($result) {
	// 		$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Pelatihan Sukses</div>');
	// 		redirect(base_url("pelatihan"));
	// 	}
	// }
	//
	// public function tambahKelas(){
  //       $data['userdata'] = $this->userdata;
	// 	$data['dataPegawai'] = $this->M_pegawai->select_all();
	// 	$data['dataPosisi'] = $this->M_posisi->select_all();
	// 	$data['dataKota'] = $this->M_kota->select_all();
	//
	// 	$data['page'] = "tambahPelatihan";
	// 	$data['judul'] = "Tambah Data Pelatihan";
	// 	$data['deskripsi'] = "Tambah data pelatihan TerasAsuh sesuai kebutuhan";
	//
	// 	$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
	// 	$this->template->views('kelas/kelas_add');
	// }
	//
	// public function tampil() {
	// 	$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
	// 	$this->load->view('pelatihan/daftar_pelatihan', $data);
	// }
	//
	// public function tampilDaftarKelas() {
	// 	$data['dataPegawai'] = $this->M_pegawai->select_all();
	// 	$this->load->view('pelatihan/daftar_kelas', $data);
	// }
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
