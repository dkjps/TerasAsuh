<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanitiaController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ClientModel');
		$this->api = 'https://api.mhscourses.ub-learningtechnology.com/api';
	}

	//---------------- FUNGSI UNTUK Admin Panitia ---------------------

    public function index() {

	}

	public function halamanMasterPanitia(){
		$data = array(
			'title' => "Master Data Panitia",
			'page' => "panitia"
		);

		$this->load->view('admin/master-panitia', $data);
	}

	public function getDatatableMasterPanitia(){
		$url = $this->api.'/master/list-panitia';
		$request = $this->ClientModel->requestDataGet($url);
		echo json_encode($request);
	}

	public function halamanPelatihanPanitia(){
		$data = array(
			'title' => "Data Pelatihan Panitia"
		);

		$this->load->view('admin/pelatihan-panitia', $data);
		//print_r("test");
	}

	// public function showDaftarPanitia(){
	// 	$request = $this->PasienModel->requestShowDaftarPasien();
	// 	echo json_encode($request);
	// }

}
