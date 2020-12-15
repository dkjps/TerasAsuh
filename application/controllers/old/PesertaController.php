<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ClientModel');
		$this->api = 'https://api.mhscourses.ub-learningtechnology.com/api';
	}

	//---------------- FUNGSI UNTUK PUSAT ---------------------

    public function index() {
		
	}

	public function halamanMasterPeserta(){
		$data = array(
			'title' => "Master Data Peserta"
		);
		
		$this->load->view('admin/master-peserta', $data);
	}
	
	public function getDatatableMasterPeserta(){
		$url = $this->api.'/master/list-peserta';
		$request = $this->ClientModel->requestDataGet($url);
		echo json_encode($request);
	} 
}