<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemateriKelas extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "kelas";
		$data['title'] = "Daftar Kelas Pemateri";
		$data['detail'] = $this->GeneralApiModel->getAllTransactional('kelas_pelatihan')->result();

		$this->template->views('pemateri_kelas/daftar_kelas', $data);
	}

	public function detailKelas($id_kelas) {
		$data['page'] = "kelas";
		$data['title'] = "Detail Kelas";

		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_kelas'=>$id_kelas),'kelas_pelatihan')->row();
		$data['materi'] = $this->GeneralApiModel->getWhereTransactional(array('id_kelas'=>$id_kelas),'detail_kelas_pemateri')->result();
		$data['pemateri'] = $this->GeneralApiModel->getKelasPemateri($id_kelas);

		$this->load->view('pemateri_kelas/detail_kelas', $data);
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
