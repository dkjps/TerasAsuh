<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institusi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "institusi";
		$data['title'] = "Daftar Institusi";
		$data['institusi'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'nama', 'ASC','masterdata_institusi')->result();

		$this->template->views('institusi/home', $data);
	}

	public function tambahinstitusi(){
		$data['nama'] = $this->input->post('institusi');
		$this->GeneralApiModel->insertMaster($data, 'masterdata_institusi');
		redirect(base_url("master/Institusi"));
	}

	public function ubahinstitusi($id){
		$data['nama'] = $this->input->post('institusi');
		$this->GeneralApiModel->updateMaster($data, array('id'=>$id), 'masterdata_institusi');
		redirect(base_url("master/Institusi"));
	}

	public function hapusinstitusi($id){
		$this->GeneralApiModel->deleteMaster(array('id'=>$id), 'masterdata_institusi');
		redirect(base_url("master/Institusi"));
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
