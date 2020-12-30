<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "materi";
		$data['title'] = "Daftar Materi";
		$data['materi'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'nama, judul', 'ASC','detail_materi')->result();

		$this->template->views('materi/home', $data);
	}

	public function detailMateri($id_materi) {
		$data['page'] = "materi";
		$data['title'] = "Detail Materi";

		$data['submateri'] = $this->GeneralApiModel->getWhereMasterOrdered(array('id_materi'=>$id_materi),'cdate', 'ASC','detail_sub_materi')->result();
		$data['jumlah_materi'] = $this->GeneralApiModel->getWhereMasterOrdered(array('id_materi'=>$id_materi, 'is_test'=>0),'cdate', 'ASC','detail_sub_materi')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_materi'=>$id_materi), 'detail_kelas_pemateri')->row();
		$this->load->view('materi/detail_materi', $data);
	}

	public function tambahMateri(){
		if (isset($_POST['submit'])) {
			$data['judul'] = $_POST['materi'];
			$data['id_pelatihan'] = $_POST['pelatihan'];
			$result = $this->GeneralApiModel->insertMaster($data, 'masterdata_materi');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Materi Sukses</div>');
				redirect(base_url("Materi"));
			}
		}
		$data['page'] = "materi";
		$data['action'] = "tambah";
		$data['title'] = "Tambah Materi";
		$data['deskripsi'] = "Tambah Materi Pelatihan";

		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$this->template->views('materi/materi_add', $data);
	}

	public function ubahMateri($id){
		if (isset($_POST['submit'])) {
			$data['judul'] = $_POST['materi'];
			$data['id_pelatihan'] = $_POST['pelatihan'];
			$result = $this->GeneralApiModel->updateMaster($data, array('id'=>$id), 'masterdata_materi');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Ubah Materi Sukses</div>');
				redirect(base_url("Materi"));
			}
		}
		$data['page'] = "materi";
		$data['action'] = "ubah";
		$data['title'] = "Ubah Materi";
		$data['deskripsi'] = "Ubah Materi Pelatihan";

		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereMaster(array('id'=>$id),'masterdata_materi')->row();
		$this->template->views('materi/materi_add', $data);
	}

	public function hapusMateri($id){
		$where['id'] = $id;
		$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_materi');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Materi Sukses</div>');
			redirect(base_url("Materi"));
		}
	}


	public function tambahJadwal($id_kelas){
		$data['page'] = "materi";
		$data['title'] = "Tambah Jadwal";

		$data['kelas'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'nama', 'ASC', 'transactional_kelas')->result();
		$data['materi'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'judul', 'ASC', 'masterdata_materi')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
		$this->template->views('materi/materi_add', $data);
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
