<?php
class MateriController extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->model('PasienModel');
	}

    public function index() {
		
    }

    public function halamanMateri(){
        $data = array(
			'title' => "Halaman Materi"
		);
		
        $this->load->view('operator/operator-materi', $data);
    }
}