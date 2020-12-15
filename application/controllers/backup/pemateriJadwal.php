<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemateri_Jadwal extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['userdata'] = $this->userdata;

		$data['page'] = "Pelatihan";
		$data['judul'] = "Ini Jadwal Pelatihan Panitia Pemateri";
		$data['deskripsi'] = "Daftar pelatihan TerasAsuh";

		$this->template->views('pelatihan/home', $data);
	}

	public function detailPelatihan($id) {
		$data['page'] = "pelatihan";
		$pelatihan = $this->GeneralApiModel->getWhereMaster(array('id'=>$id),'masterdata_pelatihan')->row();
		$data['judul'] = "Detail $pelatihan->nama";
		$data['deskripsi'] = "Detail pelatihan $pelatihan->deskripsi";

		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_pelatihan'=>$id),'kelas_pelatihan')->result();
		$this->template->views('pelatihan/detail_pelatihan', $data);
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
		$data['judul'] = "Tambah Pelatihan";
		$data['deskripsi'] = "Tambah data pelatihan TerasAsuh sesuai kebutuhan";

		$this->template->views('pelatihan/pelatihan_add', $data);
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
		$data['judul'] = "Ubah Pelatihan";
		$data['deskripsi'] = "Ubah data pelatihan TerasAsuh sesuai kebutuhan";

		$this->template->views('pelatihan/pelatihan_add', $data);
	}

	public function hapusPelatihan($id){
		$where['id'] = $id;
		$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_pelatihan');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Pelatihan Sukses</div>');
			redirect(base_url("pelatihan"));
		}
	}

	public function tambahKelas(){
        $data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$data['dataPosisi'] = $this->M_posisi->select_all();
		$data['dataKota'] = $this->M_kota->select_all();

		$data['page'] = "tambahPelatihan";
		$data['judul'] = "Tambah Data Pelatihan";
		$data['deskripsi'] = "Tambah data pelatihan TerasAsuh sesuai kebutuhan";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
		$this->template->views('kelas/kelas_add');
	}

	public function tampil() {
		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$this->load->view('pelatihan/daftar_pelatihan', $data);
	}

	public function tampilDaftarKelas() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pelatihan/daftar_kelas', $data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
