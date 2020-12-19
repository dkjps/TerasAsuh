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

	public function detailSubMateri($id) {
		$data['page'] = "materi";
		$data['title'] = "Detail Sub Materi";

		$submateri = $this->GeneralApiModel->getWhereMaster(array('id'=>$id),'masterdata_subbab_materi')->row();
		$is_test = $submateri->is_test;
		$data['is_test'] = $is_test;
		if ($is_test==0) {
			$data['detail'] = $this->GeneralApiModel->getWhereMaster(array('id_subbab_materi'=>$id),'masterdata_konten_materi')->result();
		} else {
			$data['detail'] = $this->GeneralApiModel->getWhereMaster(array('id_subbab_materi'=>$id),'masterdata_test')->result();
		}
		$this->load->view('submateri/detail_submateri', $data);
	}

	public function tambahSubMateri($id_materi){
		if (isset($_POST['submit'])) {
			$data['id_materi'] = $id_materi;
			// $data['id_materi'] = $_POST['materi'];
			$test = explode('-', $_POST['tipe']);
			$data['is_test'] = $test[0];
			$data['judul'] = $test[1];
			$data['deskripsi'] = $_POST['deskripsi'];
			$file_desk = $_POST['file_desk'];

			if ($data['is_test']==0) {
				$id_sub = $this->GeneralApiModel->insertIdMaster($data, 'masterdata_subbab_materi');

				$files = $_FILES;

				$jml = count($_FILES['files']['name']);

				$path = "./assets/materi/";
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|mp4|mkv|mov|wmv|ppt|pptx';
				$config['max_size'] = '0';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				for ($i=0; $i < $jml; $i++) {
					$filename = $files['files']['name'][$i];

					$tipe = 0;
					$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
					if ($file_ext=="jpg" || $file_ext=="png" || $file_ext=="jpeg") {
						$tipe = 1;
					} elseif ($file_ext=="mp4" || $file_ext=="mov" || $file_ext=="wmv" || $file_ext=="mkv" || $file_ext=="gif") {
						$tipe = 2;
					} elseif ($file_ext=="pdf") {
						$tipe = 3;
					}

					$trim = str_replace(" ","", $filename);
					$new_name = time().'-'.$trim;

					$_FILES['files']['name'] = $new_name;
          $_FILES['files']['type'] = $files['files']['type'][$i];
          $_FILES['files']['tmp_name'] = $files['files']['tmp_name'][$i];
          $_FILES['files']['error'] = $files['files']['error'][$i];
          $_FILES['files']['size'] = $files['files']['size'][$i];

					// $hos = "https://mhscourses.ub-learningtechnology.com/assets/materi/";

					if ($this->upload->do_upload('files')) {
						$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Sub Materi Sukses</div>');
						var_dump($this->upload->data());
					} else {
						$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
						echo $this->upload->display_errors();
					}

					$sub['tipe'] = $tipe;
					if ($tipe==0) {
						$sub['isi'] = $file_desk[$i];
					} else {
						$sub['isi'] = base_url("assets/materi/").$new_name;
					}
					$sub['deskripsi'] = $file_desk[$i];
					$sub['id_subbab_materi'] = $id_sub;

					$this->GeneralApiModel->insertMaster($sub, 'masterdata_konten_materi');
				}
				// die();
			} else {
				 	$this->GeneralApiModel->insertMaster($data, 'masterdata_subbab_materi');
			}

			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Sub Materi Sukses</div>');
			redirect(base_url("Materi/detailMateri/".$data['id_materi']));
		}

		$data['action'] = 'tambah';
		$data['page'] = "sub-materi";
		$data['title'] = "Tambah Sub Materi";

		// $data['pelatihan'] = $this->GeneralApiModel->getAllMaster('masterdata_pelatihan')->result();
		// $data['pemateri'] = $this->GeneralApiModel->getWhereTransactionalOrdered(array('1'=>1), 'namalengkap', 'ASC', 'user_pemateri_detail')->result();
		$data['detail'] = $this->GeneralApiModel->getWhereMaster(array('id'=>$id_materi), 'masterdata_materi')->row();
		$this->template->views('submateri/submateri_add', $data);
	}

	public function hapusSubMateri($id, $id_materi){
		$where['id'] = $id;
		$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_subbab_materi');
		$result2 = $this->GeneralApiModel->deleteMaster(array('id_subbab_materi'=>$id),'masterdata_konten_materi');
		if ($result && $result2) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Sub Materi Sukses</div>');
			redirect(base_url("Materi/detailMateri/$id_materi"));
		}
	}


	public function tambahSoal($id_sub){
		if (isset($_POST['submit'])) {
			$test['soal'] = $_POST['soal'];
			$test['id_subbab_materi'] = $id_sub;
			$test['tipe'] = $_POST['tipe'];

			// $id_test=0;
			$id_test = $this->GeneralApiModel->insertIdMaster($test, 'masterdata_test');
			$benar['jawaban'] = $_POST['benar'];
			$benar['id_test'] = $id_test;
			$benar['is_benar'] = 1;
			$this->GeneralApiModel->insertMaster($benar, 'masterdata_pilihan_jawaban_test');

			$answers = $_POST['answers'];
			$jawaban = array();
			foreach ($answers as $a) {
				array_push($jawaban, array('jawaban'=>$a, 'is_benar'=>0, 'id_test'=>$id_test));
			}
			// var_dump($jawaban);
			$this->GeneralApiModel->insertBatchMaster($jawaban, 'masterdata_pilihan_jawaban_test');
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Soal Sukses</div>');
			// die();
			redirect(base_url("SubMateri/detailSubMateri/".$id_sub));
		}
	}

	public function tambahMateriPembelajaran($id_sub){
		if (isset($_POST['submit'])) {
			$file_desk = $_POST['file_desk'];

				$files = $_FILES;

				$jml = count($_FILES['files']['name']);

				$path = "./assets/materi/";
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|mp4|mkv|mov|wmv|ppt|pptx';
				$config['max_size'] = '0';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				for ($i=0; $i < $jml; $i++) {
					$filename = $files['files']['name'][$i];

					$tipe = 0;
					$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
					if ($file_ext=="jpg" || $file_ext=="png" || $file_ext=="jpeg") {
						$tipe = 1;
					} elseif ($file_ext=="mp4" || $file_ext=="mov" || $file_ext=="wmv" || $file_ext=="mkv" || $file_ext=="gif") {
						$tipe = 2;
					} elseif ($file_ext=="pdf") {
						$tipe = 3;
					}

					$trim = str_replace(" ","", $filename);
					$new_name = time().'-'.$trim;

					$_FILES['files']['name'] = $new_name;
					$_FILES['files']['type'] = $files['files']['type'][$i];
					$_FILES['files']['tmp_name'] = $files['files']['tmp_name'][$i];
					$_FILES['files']['error'] = $files['files']['error'][$i];
					$_FILES['files']['size'] = $files['files']['size'][$i];

					// $hos = "https://mhscourses.ub-learningtechnology.com/assets/materi/";

					if ($this->upload->do_upload('files')) {
						$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Sub Materi Sukses</div>');
						var_dump($this->upload->data());
					} else {
						$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
						echo $this->upload->display_errors();
					}

					$sub['tipe'] = $tipe;
					if ($tipe==0) {
						$sub['isi'] = $file_desk[$i];
					} else {
						$sub['isi'] = base_url("assets/materi/").$new_name;
					}
					$sub['deskripsi'] = $file_desk[$i];
					$sub['id_subbab_materi'] = $id_sub;

					$this->GeneralApiModel->insertMaster($sub, 'masterdata_konten_materi');
				}

			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Tambah Materi Pembelajaran Sukses</div>');
			redirect(base_url("SubMateri/detailSubMateri/".$id_sub));
		}
	}

	public function hapusMateriPembelajaran($id, $id_sub){
		$where['id'] = $id;
		$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_konten_materi');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Materi Sub Materi Sukses</div>');
			redirect(base_url("SubMateri/detailSubMateri/$id_sub"));
		}
	}


	public function detailPelatihan(){
		$id = $this->input->post('id');

		$data['kelas'] = $this->GeneralApiModel->getWhereTransactional(array('id_pelatihan'=>$id),'transactional_kelas')->result();
		$data['materi'] = $this->GeneralApiModel->getWhereMaster(array('id_pelatihan'=>$id),'masterdata_materi')->result();
		echo json_encode($data);
	}

	private function set_upload_options(){
		$config = array();
		$config['upload_path'] = base_url("assets/materi");
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;

		return $config;
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
