<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->template->views('daftar', $data);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */