<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalController extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->model('PasienModel');
	}

	//---------------- FUNGSI UNTUK PUSAT ---------------------

    public function index() {
		
	}

	public function halamanPelatihanPretest(){
		$data = array(
			'title' => "Data Pelatihan Pretest"
		);
		
		$this->load->view('admin/pelatihan-pretest', $data);
    }

    public function halamanPelatihanPostest(){
        $data = array(
            'title' => "Data Pelatihan Postest"
        );
        $this->load->view('admin/pelatihan-postest', $data);
    }
}