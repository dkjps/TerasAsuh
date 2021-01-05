<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kader extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('GeneralApiModel');
	}

	public function index() {
    // $kader = $this->GeneralApiModel->getWhereTransactionalOrdered(array("1"=>1, "role"=>1), "cdate", "ASC", " transactional_kode_referal")->result();
    // $list_kader = array();
    // foreach ($kader as $b) {
    //   $id_user = $b->id_user;
    //   $daftar = $this->GeneralApiModel->getWhereTransactional(array("id"=>$id_user), 'user_provinsi_kota')->result()[0];
    //   array_push($list_kader, $daftar);
    // }

		$list_kader = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC','kader_detail')->result();

		$data['page'] = "kader";
		$data['title'] = "Daftar Kader";
		$data['kader'] = $list_kader;

		$this->template->views('admin/master-kader', $data);
	}

	public function detailkader($id){
		$pembina = $this->GeneralApiModel->getWhereTransactional(array("id"=>$id), "user_provinsi_kota")->row();
		$data['page'] = "kader";
		$data['title'] = "Detail Kader ($pembina->namalengkap)";

		$binaan = $this->GeneralApiModel->getWhereTransactionalOrdered(array("id_pembina"=>$id), "cdate", "ASC", " transactional_binaan")->result();
		$list_binaan = array();
		foreach ($binaan as $b) {
			$no_kk = $b->nomor_kk;
			$daftar = $this->GeneralApiModel->getWhereTransactional(array("nomor_kk"=>$no_kk, 'status_keluarga'=>0), 'user_anggotakeluarga_detail')->result();
			array_push($list_binaan, $daftar);
		}
		$data['keluarga'] = $list_binaan;

		// $kader = $this->GeneralApiModel->getWhereTransactionalOrdered(array("1"=>1, "role"=>1), "cdate", "ASC", " transactional_kode_referal")->result();
    // $list_kader = array();
    // foreach ($kader as $b) {
    //   $id_user = $b->id_user;
    //   $daftar = $this->GeneralApiModel->getWhereTransactional(array("id"=>$id_user), 'user_provinsi_kota')->result()[0];
    //   array_push($list_kader, $daftar);
    // }
		$list_kader = $this->GeneralApiModel->getWhereTransactionalOrdered(array('id_pembina'=>$id), 'namalengkap', 'ASC', 'kader_detail')->result();
		$data['kader'] = $list_kader;

		$this->template->views('admin/detail-kader', $data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
