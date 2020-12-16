<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubMateri extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "sub-materi";
		$data['title'] = "Daftar Pelatihan";
		$data['submateri'] = $this->GeneralApiModel->getAllMaster('detail_sub_materi')->result();

		$this->template->views('submateri/home', $data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
