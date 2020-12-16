<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "kelas";
		$data['title'] = "Daftar Kelas";
		$data['detail'] = $this->GeneralApiModel->getAllTransactional('kelas_pelatihan')->result();

		$this->template->views('kelas/daftar_kelas', $data);
	}

	public function detailKelas($id_kelas) {
		$data['page'] = "kelas";
		$data['title'] = "Detail Kelas";

		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_kelas'=>$id_kelas),'kelas_pelatihan')->row();
		$data['materi'] = $this->GeneralApiModel->getWhereTransactional(array('id_kelas'=>$id_kelas),'detail_kelas_pemateri')->result();
		$data['pemateri'] = $this->GeneralApiModel->getKelasPemateri($id_kelas);
		$this->load->view('kelas/detail_kelas', $data);
	}


	public function tambahKelas(){
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
			$result = $this->GeneralApiModel->insertTransactional($data, 'transactional_kelas');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Kelas Sukses</div>');
				redirect(base_url("Kelas"));
			}
		}
		$data['page'] = "kelas";
		$data['action'] = "tambah";
		$data['title'] = "Tambah Kelas";
		$data['deskripsi'] = "Tambah kelas pelatihan TerasAsuh sesuai kebutuhan";

		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$this->template->views('kelas/kelas_add', $data);
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
				redirect(base_url("kelas"));
			}
		}
		$data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		$data['page'] = "kelas";
		$data['action'] = "ubah";
		$data['title'] = "Ubah Kelas ";


		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id'=>$id_kelas),'transactional_kelas')->row();
		$this->template->views('kelas/kelas_add', $data);
	}

	public function hapusKelas($id_kelas){
		$where['id'] = $id_kelas;
		$result = $this->GeneralApiModel->deleteTransactional($where,'transactional_kelas');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Pelatihan Sukses</div>');
			redirect(base_url("Kelas"));
		}
	}

	public function tambahMateri(){
		$data['page'] = "materi";
		$data['judul'] = "Tambah Materi";
		$data['deskripsi'] = "Tambah data materi TerasAsuh sesuai kebutuhan";

		$this->template->views('materi/materi_add', $data);
	}

	public function tambahJadwal($id_kelas){
		if (isset($_POST['submit'])) {
			$data['id_kelas'] = $_POST['kelas'];
			$data['id_materi'] = $_POST['materi'];
			$data['id_panitia'] = $_POST['pemateri'];
			$data['tgl_buka_materi'] = $_POST['tgl'].' '.$_POST['jam'];
			$result = $this->GeneralApiModel->insertTransactional($data, 'transactional_jadwal');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Jadwal Sukses</div>');
				redirect(base_url("Kelas/detailKelas/".$data['id_kelas']));
			}
		}
		$data['action'] = "tambah";
		$data['page'] = "materi";
		$data['title'] = "Tambah Jadwal";

		$data['id_kelas'] = $id_kelas;

		$data['kelas'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'nama', 'ASC', 'transactional_kelas')->result();
		$data['materi'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'judul', 'ASC', 'masterdata_materi')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
		$this->template->views('materi/materi_add', $data);
	}

	public function ubahJadwal($id_kelas, $id){
		if (isset($_POST['submit'])) {
			$data['id_kelas'] = $_POST['kelas'];
			$data['id_materi'] = $_POST['materi'];
			$data['id_panitia'] = $_POST['pemateri'];
			$data['tgl_buka_materi'] = $_POST['tgl'].' '.$_POST['jam'];
			$result = $this->GeneralApiModel->updateTransactional($data, array('id'=>$id), 'transactional_jadwal');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Jadwal Sukses</div>');
				redirect(base_url("Kelas/detailKelas/".$data['id_kelas']));
			}
		}
		$data['action'] = "ubah";
		$data['page'] = "materi";
		$data['title'] = "Ubah Jadwal";

		$data['id_kelas'] = $id_kelas;

		$data['kelas'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'nama', 'ASC', 'transactional_kelas')->result();
		$data['materi'] = $this->GeneralApiModel->getWhereMasterOrdered(array('1'=>1), 'judul', 'ASC', 'masterdata_materi')->result();
		$data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereTransactional(array('id_jadwal'=>$id),'detail_kelas_pemateri')->row();

		$this->template->views('materi/materi_add', $data);
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
