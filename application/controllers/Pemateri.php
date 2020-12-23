<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemateri extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "pelatihan";
		$data['title'] = "Daftar Pemateri";

		$this->template->views('pemateri/home_pemateri', $data);
	}

	public function tambahPemateri(){
		$data['page'] = "pemateri";
		$data['title'] = "Tambah Pemateri";

		$data['provinsi'] = $this->GeneralApiModel->getAllMaster('masterdata_provinsi')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
		$this->template->views('pemateri/pemateri_add', $data);
	}

	public function tambahJadwal(){
		$data['page'] = "pemateri";
		$data['title'] = "Atur Jadwal Pemateri";

		$data['provinsi'] = $this->GeneralApiModel->getAllMaster('masterdata_provinsi')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$this->template->views('pemateri/pemateri_aturJadwal', $data);
	}

	public function aturJadwal(){
		$data['action'] = "ubah";
		$data['page'] = "pemateri";
		$data['title'] = "Atur Jadwal";

		$this->load->view('pemateri/atur_jadwal', $data);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
