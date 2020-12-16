<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ClientModel');
		$this->api = 'http://api.mhscourses.ub-learningtechnology.com/api/admin';
	}

    public function lihatAdmin() {
		$data = array(
			'title' => "Dashboard",
			'page' => 'dashboard'
		);
		$this->load->view('admin/dashboard', $data);
	}

	public function dashboard(){
		$url = $this->api.'/dashboard';
		$request = $this->ClientModel->requestDataGet($url);
		echo json_encode($request);
	}
}
