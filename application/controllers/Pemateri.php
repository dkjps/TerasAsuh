<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemateri extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "pemateri";
		$data['title'] = "Daftar Pemateri";
		$data['pemateri'] = $this->GeneralApiModel->getAllTransactional('user_pemateri_detail')->result();

		$this->template->views('pemateri/home_pemateri', $data);
	}

	public function tambahPemateri(){
		$data['page'] = "pemateri";
		$data['title'] = "Tambah Pemateri";

		$data['provinsi'] = $this->GeneralApiModel->getAllMaster('masterdata_provinsi')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
		$this->template->views('pemateri/pemateri_add', $data);
	}

	// public function tambahJadwal(){
	// 	$data['page'] = "pemateri";
	// 	$data['title'] = "Atur Jadwal Pemateri";
	//
	// 	$data['provinsi'] = $this->GeneralApiModel->getAllMaster('masterdata_provinsi')->result();
	// 	$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
	// 	$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
	// 	$this->template->views('pemateri/pemateri_aturJadwal', $data);
	// }

	public function aturJadwal(){
		$data['action'] = "ubah";
		$data['page'] = "pemateri";
		$data['title'] = "Atur Jadwal";

		$this->load->view('pemateri/atur_jadwal', $data);
	}

	public function jadwalPemateri($id){
		$data['page'] = "pemateri";
		$data['title'] = "Detail Pemateri";

		$data['materi'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('id_panitia'=>$id), 'tgl_buka_materi, judul_materi', 'ASC','detail_kelas_pemateri')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id'=>$id),'user_pemateri_detail')->row();

		$this->template->views('pemateri/detail_pemateri', $data);
	}

	public function tambahJadwal($id_pemateri){
		if (isset($_POST['submit'])) {
			$materi['id_pelatihan'] = $_POST['pelatihan'];
			// $materi['id_materi'] = $_POST['materi'];
			$materi['judul'] = $_POST['materi'];
			$materi['statusdata'] = 0;

			$id_materi = $this->GeneralApiModel->insertIdMaster($materi, 'masterdata_materi');

			$data['id_kelas'] = $_POST['kelas'];
			$data['id_materi'] = $id_materi;
			$data['id_panitia'] = $id_pemateri;
			$data['tgl_buka_materi'] = $_POST['tgl'].' '.$_POST['jam'];
			$result = $this->GeneralApiModel->insertTransactional($data, 'transactional_jadwal');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Jadwal Sukses</div>');
				redirect(base_url("Pemateri/jadwalPemateri/$id_pemateri"));
			}
		}
		$data['action'] = "tambah";
		$data['page'] = "pemateri";
		$data['title'] = "Tambah Jadwal";


		$data['kelas'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'nama', 'ASC', 'transactional_kelas')->result();
		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('id'=>$id_pemateri), 'namalengkap', 'ASC', 'user_pemateri_detail')->row();
		$this->template->views('pemateri/jadwal_add', $data);
	}

	public function ubahJadwal($id_pemateri, $id){
		if (isset($_POST['submit'])) {
			$materi['id_pelatihan'] = $_POST['pelatihan'];
			// $materi['id_materi'] = $_POST['materi'];
			$materi['judul'] = $_POST['materi'];
			$materi['statusdata'] = 0;

			// $id_materi = $this->GeneralApiModel->insertIdMaster($materi, 'masterdata_materi');

			$data['id_kelas'] = $_POST['kelas'];
			$data['id_materi'] = $id_materi;
			$data['id_panitia'] = $id_pemateri;
			// $data['tgl_buka_materi'] = $_POST['tgl'].' '.$_POST['jam'];
			$result = $this->GeneralApiModel->updateTransactional($data, array('id'=>$id), 'transactional_jadwal');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Jadwal Sukses</div>');
				redirect(base_url("Pemateri/jadwalPemateri/$id_pemateri"));
			}
		}
		$data['action'] = "tambah";
		$data['page'] = "pemateri";
		$data['title'] = "Ubah Jadwal";


		$data['kelas'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'nama', 'ASC', 'transactional_kelas')->result();
		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('id'=>$id_pemateri), 'namalengkap', 'ASC', 'user_pemateri_detail')->row();
		$this->template->views('pemateri/jadwal_add', $data);
	}

	function hapusJadwal($id_pemateri, $id){
		$where['id'] = $id;
		$id_materi = $this->GeneralApiModel->getWhereTransactional($where, 'transactional_jadwal')->row()->id_materi;
		$this->GeneralApiModel->deleteMaster(array('id'=>$id_materi),'masterdata_materi');
		$result = $this->GeneralApiModel->deleteTransactional($where,'transactional_jadwal');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Jadwal Sukses</div>');
			redirect(base_url("Pemateri/jadwalPemateri/$id_pemateri"));
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
