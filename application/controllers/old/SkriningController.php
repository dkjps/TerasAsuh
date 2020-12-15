<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SkriningController extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->model('PasienModel');
	}

	//---------------- FUNGSI UNTUK PUSAT ---------------------

    public function index() {
		
	}

	public function halamanSkrining(){
		$data = array(
			'title' => "Data Skrining"
		);
		
		$this->load->view('admin/skrining', $data);
    }
}