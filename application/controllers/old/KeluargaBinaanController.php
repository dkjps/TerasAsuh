<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeluargaBinaanController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ClientModel');
		$this->api = 'https://api.mhscourses.ub-learningtechnology.com/api';
	}

	//---------------- FUNGSI UNTUK PUSAT ---------------------

    public function index() {
		
	}

	public function halamanMasterKeluargaBinaan(){
		$data = array(
			'title' => "Master Data Keluarga Binaan"
		);
		
		$this->load->view('admin/master-keluarga-binaan', $data);
	}
	
	public function getDatatableMasterKeluargaBinaan(){
		$url = $this->api.'/master/list-keluarga-binaan';
		$request = $this->ClientModel->requestDataGet($url);
		echo json_encode($request);
	} 
}