<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "faq";
		$data['title'] = "Daftar FAQ";
		$data['kategori'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'kategori', 'ASC','masterdata_kategori_faq')->result();
		$data['cont'] = $this;

		$this->template->views('faq/home', $data);
	}

	public function listPertanyaan($id_kategori){
		return $this->GeneralApiModel->getWhereMasterOrdered(array('id_kategori'=>$id_kategori), 'pertanyaan', 'ASC', 'masterdata_faq')->result();
	}

	public function tambahKategori(){
		$data['kategori'] = $this->input->post('kategori');
		$this->GeneralApiModel->insertMaster($data, 'masterdata_kategori_faq');
		redirect(base_url("master/Faq"));
	}

	public function tambahPertanyaan(){
		if (isset($_POST['submit'])) {
			$data['id_kategori'] = $_POST['kategori'];
			$data['pertanyaan'] = $_POST['pertanyaan'];
			$this->GeneralApiModel->insertMaster($data, 'masterdata_faq');
			redirect(base_url("master/Faq"));
		}

		$data['page'] = "faq";
		$data['title'] = "FAQ";
		$data['action'] = "tambah";
		$data['kategori'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'kategori', 'ASC','masterdata_kategori_faq')->result();
		$this->template->views('faq/faq_add', $data);
	}

	public function ubahPertanyaan($id){
		if (isset($_POST['submit'])) {
			$data['id_kategori'] = $_POST['kategori'];
			$data['pertanyaan'] = $_POST['pertanyaan'];
			$this->GeneralApiModel->updateMaster($data, array('id'=>$id), 'masterdata_faq');
			redirect(base_url("master/Faq"));
		}

		$data['page'] = "faq";
		$data['title'] = "FAQ";
		$data['action'] = "ubah";
		$data['kategori'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'kategori', 'ASC','masterdata_kategori_faq')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereMaster(array('id'=>$id), 'detail_faq')->row();
		$this->template->views('faq/faq_add', $data);
	}

	public function ubahKategori($id){
		$data['kategori'] = $this->input->post('kategori');
		$this->GeneralApiModel->updateMaster($data, array('id'=>$id), 'masterdata_kategori_faq');
		redirect(base_url("master/Faq"));
	}

	public function hapusKategori($id){
		$this->GeneralApiModel->deleteMaster(array('id'=>$id), 'masterdata_kategori_faq');
		$this->GeneralApiModel->deleteMaster(array('id_kategori'=>$id), 'masterdata_faq');
		redirect(base_url("master/Faq"));
	}

	public function hapusPertanyaan($id){
		$this->GeneralApiModel->deleteMaster(array('id'=>$id), 'masterdata_faq');
		redirect(base_url("master/Faq"));
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
