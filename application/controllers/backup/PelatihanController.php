<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelatihanController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ClientModel');
		$this->load->model('GeneralApiModel');
		$this->api = 'https://api.mhscourses.ub-learningtechnology.com/';
	}

	//---------------- FUNGSI UNTUK WEB ---------------------

	public function index() {

	}

	public function halamanMasterPelatihan(){
		$data = array(
			'title' => "Master Data Pelatihan"
		);
		$url = $this->api."api/master/list-pelatihan";
		$pelatihan = json_decode(file_get_contents($url), true);
		$data['pelatihan'] = $this->array_to_object($pelatihan['data']);

		$this->load->view('admin/master-pelatihan', $data);
	}

	public function detailMasterPelatihan($id){
		$pelatihan = $this->GeneralApiModel->getWhereMaster(array('id'=>$id),'masterdata_pelatihan')->row();
		$data['title'] = "Detail $pelatihan->nama";

		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_pelatihan'=>$id),'kelas_pelatihan')->result();
		$this->load->view('pelatihan/detail_pelatihan', $data);
	}

	public function getDatatableMasterPelatihan(){
		$url = $this->api.'/master/list-pelatihan';
		$request = $this->ClientModel->requestDataGet($url);
		echo json_encode($request);
	}

	public function tambahMasterPelatihan(){
		$url = $this->api.'/master/input-pelatihan';
		$data = array(
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$request = $this->ClientModel->requestDataPost($url,$data);
		echo json_encode($request);
	}

	public function hapusMasterPelatihan(){
		$url = $this->api.'/master/hapus-pelatihan';
		$data = array(
			'id' => $this->input->post('id')
		);
		$request = $this->ClientModel->requestDataPost($url, $data);
		echo json_encode($request);
	}

	public function editMasterPelatihan(){
		$url = $this->api.'/master/edit-pelatihan';
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$request = $this->ClientModel->requestDataPost($url, $data);
		echo json_encode($request);
	}

	function array_to_object($data){
    if (is_array($data) || is_object($data))
    {
        $result= new stdClass();
        foreach ($data as $key => $value)
        {
            $result->$key = $this->array_to_object($value);
        }
        return $result;
    }
    return $data;
	}
}
