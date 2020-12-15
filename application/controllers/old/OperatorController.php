<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperatorController extends CI_Controller {

    public function lihatOperator() {
		$data = array(
			'title' => "Dashboard Operator"
		);
		$this->load->view('operator/dashboard', $data);
	}
}