<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaderController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ClientModel');
		$this->api = 'https://api.mhscourses.ub-learningtechnology.com/api';
	}

	//---------------- FUNGSI UNTUK PUSAT ---------------------

    public function index() {
		
	}

	public function halamanMasterKader(){
		$data = array(
			'title' => "Master Data Kader"
		);
		
		$this->load->view('admin/master-kader', $data);
	}
	
	public function getDatatableMasterKader(){
		$url = $this->api.'/master/list-kader';
		$request = $this->ClientModel->requestDataGet($url);
		echo json_encode($request);
    }
}