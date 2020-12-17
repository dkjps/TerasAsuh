<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubMateri extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "sub-materi";
		$data['title'] = "Daftar Pelatihan";
		$data['submateri'] = $this->GeneralApiModel->getAllMaster('detail_sub_materi')->result();

		$this->template->views('submateri/home', $data);
	}

	public function tambahSubMateri(){
		if (isset($_POST['submit'])) {			
		}


		$data['page'] = "sub-materi";
		$data['title'] = "Tambah Pelatihan";

		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();

		$this->template->views('submateri/submateri_add', $data);
	}

	public function detailPelatihan(){
		$id = $this->input->post('id');

		$data['kelas'] = $this->GeneralApiModel->getWhereTransactional(array('id_pelatihan'=>$id),'transactional_kelas')->result();
		$data['materi'] = $this->GeneralApiModel->getWhereMaster(array('id_pelatihan'=>$id),'masterdata_materi')->result();
		echo json_encode($data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
