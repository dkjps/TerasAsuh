<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AktivitasController extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->model('PasienModel');
	}

	//---------------- FUNGSI UNTUK PUSAT ---------------------

    public function index() {
		
	}

	public function halamanAktivitas(){
		$data = array(
			'title' => "Data Aktivitas"
		);
		
		$this->load->view('admin/aktivitas', $data);
    }
}