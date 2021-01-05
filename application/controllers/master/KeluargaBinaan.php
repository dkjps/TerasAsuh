<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeluargaBinaan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "keluarga";
		$data['title'] = "Daftar Keluarga Binaan";

		$keluarga = $this->GeneralApiModel->getAllTransactional('transactional_binaan')->result();
		$list_binaan = array();
		foreach ($keluarga as $k) {
			$daftar = $this->GeneralApiModel->getWhereTransactional(array("nomor_kk"=>$k->nomor_kk, 'status_keluarga'=>0), 'user_anggotakeluarga_detail')->result();
			array_push($list_binaan, $daftar);
		}

		$data['keluarga'] = $list_binaan;
		$this->template->views('admin/master-keluarga-binaan', $data);
	}

	public function detail($no_kk){
		$data['page'] = "keluarga";
		$data['title'] = "Detail Keluarga Binaan";

		$daftar = $this->GeneralApiModel->getWhereTransactional(array("nomor_kk"=>$no_kk), 'user_anggotakeluarga_detail')->result();


		$data['keluarga'] = $daftar;
		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('nomor_kk'=>$no_kk), 'transactional_binaan')->row();
		$data['pembina'] = $this->GeneralApiModel->getWhereTransactional(array('id'=>$data['detail']->id_pembina), 'transactional_user')->row();
		$data['kepala'] = $this->GeneralApiModel->getWhereTransactional(array("nomor_kk"=>$no_kk, 'status_keluarga'=>0), 'user_anggotakeluarga_detail')->row();
		$this->template->views('admin/detail-keluarga-binaan', $data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
