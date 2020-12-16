<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "materi";
		$data['title'] = "Daftar Materi";
		// $data['detail'] = $this->GeneralApiModel->getAllTransactional('kelas_pelatihan')->result();

		$data['materi'] = $this->GeneralApiModel->getAllTransactional('detail_kelas_pemateri')->result();
		$this->template->views('materi/daftar_materi', $data);
	}

	public function tambahJadwal(){
		if (isset($_POST['submit'])) {
			$data['id_kelas'] = $_POST['kelas'];
			$data['id_materi'] = $_POST['materi'];
			$data['id_panitia'] = $_POST['pemateri'];
			$data['tgl_buka_materi'] = $_POST['tgl'].' '.$_POST['jam'];
			$result = $this->GeneralApiModel->insertTransactional($data, 'transactional_jadwal');
			if ($result) {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Jadwal Sukses</div>');
				redirect(base_url("Kelas/detailKelas/$id_kelas"));
			}
		}

		$data['action'] = "tambah";
		$data['page'] = "materi";
		$data['title'] = "Tambah Materi";

		$this->template->views('materi/materi_add', $data);
	}

	function hapusJadwal($id_kelas, $id){
		$where['id'] = $id;
		$result = $this->GeneralApiModel->deleteTransactional($where,'transactional_jadwal');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Jadwal Sukses</div>');
			redirect(base_url("Kelas/detailKelas/$id_kelas"));
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
