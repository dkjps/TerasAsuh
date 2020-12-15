<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['jml_pelatihan'] 	= count($this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result());
		$data['jml_kelas'] 	= count($this->GeneralApiModel->getAllTransactional('transactional_kelas')->result());
		$data['jml_pemateri'] 	= count($this->GeneralApiModel->getAllTransactional('transactional_kelas')->result());		

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Selamat Datang Panitia di TerasAsuh";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
