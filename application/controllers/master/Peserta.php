<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "peserta";
		$data['title'] = "Daftar Peserta";
		$data['peserta'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1),'namalengkap', 'ASC', 'user_peserta_detail')->result();

		$this->template->views('admin/master-peserta', $data);
	}

	public function detailPeserta($id){
		$data['page'] = "peserta";
		$pembina = $this->GeneralApiModel->getWhereTransactional(array("id"=>$id), "user_peserta_detail")->row();
		$data['title'] = "Daftar Keluarga Binaan ($pembina->namalengkap)";

		$binaan = $this->GeneralApiModel->getWhereTransactionalOrdered(array("id_pembina"=>$id), "cdate", "ASC", " transactional_binaan")->result();
		$list_binaan = array();
		foreach ($binaan as $b) {
			$no_kk = $b->nomor_kk;
			$daftar = $this->GeneralApiModel->getWhereTransactional(array("nomor_kk"=>$no_kk, 'status_keluarga'=>0), 'user_anggotakeluarga_detail')->result();
			array_push($list_binaan, $daftar);
		}
		$data['keluarga'] = $list_binaan;
		$this->template->views('admin/detail-peserta', $data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
