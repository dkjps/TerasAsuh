<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    $this->dateToday = date("Y-m-d");
    $this->timeToday = date("h:i:s");
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "today";
		$data['menu'] = "aktivitas";
		$data['title'] = "Aktivitas Hari Ini";
		$data['deskripsi'] = "Daftar pelatihan TerasAsuh";

		$data['today'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('tanggal'=>$this->dateToday), 'jam', 'DESC', 'transactional_aktivitas_panitia')->result();
		$this->template->views('aktivitas/aktivitas_today', $data);
	}

	public function aktivitasDaftar($tgl) {
		$data['page'] = "allday";
		$data['menu'] = "aktivitas";
		$data['title'] = "Daftar Aktivitas Anda";

		$data['visible'] = true;
		// $tgl = $this->dateToday;
		//
		// if (isset($_GET['tanggal'])) {
		// 		if ($this->dateToday!=$_GET['tanggal']) {
		// 			$data['visible'] = false;
		// 		}
		// 		$tgl = $_GET['tanggal'];
		// }

		$data['tgl'] = $tgl;
		$data['next'] = date('Y-m-d', strtotime($tgl.' +1days'));
		$data['prev'] = date('Y-m-d', strtotime($tgl.' -1days'));
		$data['today'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('tanggal'=>$tgl), 'jam', 'DESC', 'transactional_aktivitas_panitia')->result();
		$this->template->views('aktivitas/home_aktivitas', $data);
	}

	public function tambahAktivitas(){
		if (isset($_POST['submit'])) {
			$aktivitas['id_panitia'] = $_SESSION['id'];
			$aktivitas['nama'] = $_POST['nama'];
			$aktivitas['deskripsi'] = $_POST['deskripsi'];
			$aktivitas['tanggal'] = $_POST['tgl'];
			$aktivitas['jam'] = $_POST['jam'];

			$result = $this->GeneralApiModel->insertTransactional($aktivitas, 'transactional_aktivitas_panitia');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Aktivitas Sukses</div>');
				redirect(base_url("Aktivitas/"));
			}
		}
		$data['action'] = "tambah";
		$data['page'] = "today";
		$data['title'] = "Tambah Aktivitas";

		$this->template->views('aktivitas/aktivitas_add', $data);
	}

	public function ubahAktivitas($id){
		if (isset($_POST['submit'])) {
			$aktivitas['id_panitia'] = $_SESSION['id'];
			$aktivitas['nama'] = $_POST['nama'];
			$aktivitas['deskripsi'] = $_POST['deskripsi'];
			$aktivitas['tanggal'] = $_POST['tgl'];
			$aktivitas['jam'] = $_POST['jam'];

			$result = $this->GeneralApiModel->updateTransactional($aktivitas, array('id'=>$id), 'transactional_aktivitas_panitia');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Ubah Aktivitas Sukses</div>');
				redirect(base_url("Aktivitas/"));
			}
		}

		$data['action'] = "ubah";
		$data['page'] = "today";
		$data['title'] = "Ubah Aktivitas";

		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id'=>$id), 'transactional_aktivitas_panitia')->row();
		$this->template->views('aktivitas/aktivitas_add', $data);
	}


	public function hapusAktivitas($id){
		$where['id'] = $id;
		$result = $this->GeneralApiModel->deleteTransactional($where,'transactional_aktivitas_panitia');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Aktivitas Sukses</div>');
			redirect(base_url("Aktivitas"));
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
