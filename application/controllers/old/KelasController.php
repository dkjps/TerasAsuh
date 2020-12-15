<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelasController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('KelasModel');
		$this->api = 'http://api.mhscourses.ub-learningtechnology.com/api/admin';
	}

	//---------------- FUNGSI UNTUK WEB ---------------------

    public function index() {
		
	}

	public function halamanMasterKelas(){
		$data = array(
			'title' => "Master Data Kelas"
		);
		
		$this->load->view('admin/master-kelas', $data);
	}
	
	public function tambahMasterKelas(){
		$url = $this->api.'/master/input-kelas';
		$data = array(
			'nama' => $this->input->post('nama'),
			'kapasitas' => $this->input->post('kapasitas')
		);
		$request = $this->KelasModel->requestDataPost($url,$data);
		echo json_encode($request);
	}

	public function detailMasterKelas(){
		$url = $this->api.'/master/detail-kelas';
		$data = array(
			'id' => $this->input->post('id')
		);
		$request = $this->KelasModel->requestDataPost($url, $data);
		echo json_encode($request);
	}

	public function hapusMasterKelas(){
		$url = $this->api.'/master/hapus-kelas';
		$data = array(
			'id' => $this->input->post('id')
		);
		$request = $this->KelasModel->requestDataPost($url, $data);
		echo json_encode($request);
	}

	public function editMasterKelas(){
		$url = $this->api.'/master/edit-kelas';
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'kapasitas' => $this->input->post('kapasitas')
		);
		$request = $this->KelasModel->requestDataPost($url, $data);
		echo json_encode($request);
	}

	public function getDatatableMasterKelas(){
		$url = $this->api.'/master/daftar-kelas';
		$request = $this->KelasModel->requestDataGet($url);
		echo json_encode($request);
	}
}