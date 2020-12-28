<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralApiModel');
	}

	public function index() {
		$data['page'] = "Pelatihan";
		$data['title'] = "Pengaturan Akun";
		$data['deskripsi'] = "Daftar pelatihan TerasAsuh";

		$data['panitia'] = $this->GeneralApiModel->getWhereTransactional(array('id'=>$_SESSION['id']), 'user_panitia_detail')->row();
		$this->template->views('akun/pengaturan', $data);
	}

	public function ubahPasssword(){
		$data['page'] = "tambahPelatihan";
		$data['title'] = "Ubah Password";
		$data['deskripsi'] = "Tambah data pelatihan TerasAsuh sesuai kebutuhan";

		$this->template->views('akun/ubahPassword');
	}

	function ubahProfil(){
		$id_user = $_SESSION['id'];
		$namalengkap = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('nohp');
		$alamat = $this->input->post('alamat');

		$this->GeneralApiModel->updateTransactional(array('namalengkap'=>$namalengkap, 'nohp'=>$no_hp, 'email'=>$email),array('id'=>$id_user),'transactional_user');
		$this->GeneralApiModel->updateTransactional(array('alamat_lengkap'=>$alamat),array('id_user'=>$id_user),'transactional_alamat');
		$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Ubah Profil Sukses</div>');
		redirect(base_url("Akun"));
	}

	function gantiPassword(){
		$id_user = $_SESSION['id'];
		$old_password = $this->input->post('lama');
		$new_password = $this->input->post('baru');
		$conf_password = $this->input->post('konfirmasi');

		$user = $this->GeneralApiModel->getWhereTransactional(array('id'=>$id_user),'transactional_user')->row();
		if (password_verify($old_password, $user->password)) {
			if ($new_password==$conf_password) {
				$baru = password_hash($new_password, PASSWORD_DEFAULT);
				$this->GeneralApiModel->updateTransactional(array('password'=>$baru),array('id'=>$id_user),'transactional_user');
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Password Berhasil Diubah</div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-danger" role="alert">Password Tidak Sama</div>');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-danger" role="alert">Password Lama Salah</div>');
		}
		redirect(base_url("Akun"));
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
