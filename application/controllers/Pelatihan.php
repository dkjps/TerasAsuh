<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    $this->dateToday = date("Y-m-d");
    $this->timeToday = date("h:i:s");
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "pelatihan";
		$data['title'] = "Daftar Pelatihan";
		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$data['cont'] = $this;

		$this->load->view('pelatihan/home', $data);
	}

	public function detailPelatihan($id) {
		$data['page'] = "pelatihan";
		$pelatihan = $this->GeneralApiModel->getWhereMaster(array('id'=>$id),'masterdata_pelatihan')->row();
		$data['title'] = "Detail $pelatihan->nama";

		$data['detail'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('id_pelatihan'=>$id), 'nama_kelas', 'ASC','kelas_pelatihan')->result();
		$this->load->view('pelatihan/detail_pelatihan', $data);
	}

	public function tambahPelatihan(){
		if (isset($_POST['submit'])) {
			$data['nama'] = $_POST['nama'];
			$data['deskripsi'] = $_POST['deskripsi'];
			$result = $this->GeneralApiModel->insertMaster($data, 'masterdata_pelatihan');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Pelatihan Sukses</div>');
				redirect(base_url("pelatihan"));
			}
		}
		$data['page'] = "pelatihan";
		$data['action'] = "tambah";
		$data['title'] = "Tambah Pelatihan";

		$this->load->view('pelatihan/pelatihan_add', $data);
	}

	public function ubahPelatihan($id){
		if (isset($_POST['submit'])) {
			$data['nama'] = $_POST['nama'];
			$data['deskripsi'] = $_POST['deskripsi'];
			$where['id'] = $id;
			$result = $this->GeneralApiModel->updateMaster($data, $where,'masterdata_pelatihan');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Ubah Pelatihan Sukses</div>');
				redirect(base_url("pelatihan"));
			}
		}
		$data['action'] = "ubah";
		$data['page'] = "pelatihan";
		$data['detail'] = $this->GeneralApiModel->getWhereMaster(array('id'=>$id),'masterdata_pelatihan')->row();
		$data['title'] = "Ubah Pelatihan";

		$this->load->view('pelatihan/pelatihan_add', $data);
	}

	public function hapusPelatihan($id){
		$where['id'] = $id;
		$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_pelatihan');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Pelatihan Sukses</div>');
			redirect(base_url("pelatihan"));
		}
	}


	public function tampilDaftarKelas() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pelatihan/daftar_kelas', $data);
	}

	public function tambahKelas($id_pelatihan){
		if (isset($_POST['submit'])) {
			$data['id_pelatihan'] = $id_pelatihan;
			$data['nama'] = $_POST['kelas'];
			$data['kapasitas'] = $_POST['kapasitas'];
			$data['tgl_buka'] = $_POST['tgl_buka'];
			$data['tgl_selesai'] = $_POST['tgl_selesai'];
			$this->load->helper('string');
			$random = random_string('alnum', 6);
			$data['kode_referal'] = $random;
			$data['is_buka_pendaftaran'] = 0;
			$data['statusdata'] = 0;
			$result = $this->GeneralApiModel->insertTransactional($data, 'transactional_kelas');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Kelas Sukses</div>');
				redirect(base_url("Pelatihan/detailPelatihan/".$data['id_pelatihan']));
			}
		}
		$data['page'] = "pelatihan";
		$data['action'] = "tambah";
		$data['title'] = "Tambah Kelas";

		$data['pelatihan'] = $this->GeneralApiModel->getWhereMaster(array('id'=>$id_pelatihan),'masterdata_pelatihan')->row();
		$this->template->views('pelatihan/kelas_add', $data);
	}

	public function ubahKelas($id_kelas){
		if (isset($_POST['submit'])) {
			$data['id_pelatihan'] = $_POST['pelatihan'];
			$data['nama'] = $_POST['kelas'];
			$data['kapasitas'] = $_POST['kapasitas'];
			$data['tgl_buka'] = $_POST['tgl_buka'];
			$data['tgl_selesai'] = $_POST['tgl_selesai'];
			$this->load->helper('string');
			$random = random_string('alnum', 6);
			$data['kode_referal'] = $random;
			$data['is_buka_pendaftaran'] = 0;
			$data['statusdata'] = 0;

			$result = $this->GeneralApiModel->updateTransactional($data, array('id'=>$id_kelas), 'transactional_kelas');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Ubah Kelas Sukses</div>');
				redirect(base_url("Pelatihan/detailPelatihan/".$data['id_pelatihan']));
			}
		}
		$data['page'] = "pelatihan";
		$data['action'] = "ubah";
		$data['title'] = "Ubah Kelas";

		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_kelas'=>$id_kelas),'kelas_pelatihan')->row();
		$this->template->views('pelatihan/kelas_add', $data);
	}

	public function hapusKelas($id_pelatihan, $id_kelas){
		$where['id'] = $id_kelas;
		$result = $this->GeneralApiModel->deleteTransactional($where,'transactional_kelas');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Pelatihan Sukses</div>');
			redirect(base_url("pelatihan/detailPelatihan/$id_pelatihan"));
		}
	}

	public function is_delete($id){
		$result = $this->GeneralApiModel->getWhereTransactional(array('id_pelatihan'=>$id, 'status_kelas!='=>3), 'kelas_pelatihan')->result();
		if (count($result)>0) {
			return false;
		}
		return true;
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
