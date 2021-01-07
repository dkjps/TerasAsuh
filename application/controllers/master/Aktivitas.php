<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas extends AUTH_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("GeneralApiModel");
		// $this->load->library('session');
	}

	function tambahSoal(){
		if (isset($_POST['simpan'])) {
			$insert['id_aktivitas'] = $_POST['aktivitas'];
			$insert['soal'] = $_POST['soal'];
			$insert['tipe'] = $_POST['tipe'];
			$insert['id_topik'] = $_POST['topik'];
			$id_soal = $this->GeneralApiModel->insertIdMaster($insert, 'masterdata_soal_aktivitas');
			$jawaban = $_POST['jawaban'];
			$list_jawaban = array();
			foreach ($jawaban as $j) {
				array_push($list_jawaban, array('jawaban'=>$j, 'id_soal'=>$id_soal));
			}
			$this->GeneralApiModel->insertBatchMaster($list_jawaban, 'masterdata_pilihan_jawaban_aktivitas');
			$this->session->set_flashdata('msg', 'Tambah Soal & Jawaban Sukses!');
			redirect(base_url("master/Aktivitas?aktivitas=".$_POST['aktivitas']."&cari=true"));
		}
		$data['aktivitas'] = $this->GeneralApiModel->getAllMaster('masterdata_aktivitas')->result();
		$data['topik'] = $this->GeneralApiModel->getAllMaster('masterdata_topik')->result();

		$data['page'] = "aktivitas";
		$data['title'] = "Tambah Soal/Topik Aktivitas";
		$this->template->views('admin/master-aktivitas', $data);
	}

	function tambahTopik(){
		if (isset($_POST['simpan_topik'])) {
			$insert['nama'] = $_POST['topik'];
			$this->GeneralApiModel->insertMaster($insert, 'masterdata_topik');
			$this->session->set_flashdata('msg', 'Tambah Soal & Jawaban Sukses!');
			redirect(base_url("master/Aktivitas/tambahSoal"));
		}
		$data['aktivitas'] = $this->GeneralApiModel->getAllMaster('masterdata_aktivitas')->result();
		$data['topik'] = $this->GeneralApiModel->getAllMaster('masterdata_topik')->result();
		$this->load->view('aktivitas', $data);
	}

	function index(){
		$id_aktivitas = $this->input->get("aktivitas");
		$data['aktivitas'] = $this->GeneralApiModel->getAllMaster('masterdata_aktivitas')->result();
		$pilih = $this->GeneralApiModel->getWhereMaster(array('id'=>$id_aktivitas),'masterdata_aktivitas')->row();
		$html = '';
		$abjad = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$topik = 0;
		if (!empty($id_aktivitas)) {
			$aktivitas = $this->GeneralApiModel->getWhereMaster(array('id_aktivitas'=>$id_aktivitas),'detail_soal_aktivitas')->result();
			$id_topik = 0;
			$id_soal = 0;
			$id_jawaban = 0;
			$html .= "<h1 align='center'>".($aktivitas?"Aktivitas ".$aktivitas[0]->nama:"Data ".$pilih->nama." Kosong")."</h1>";
			foreach ($aktivitas as $a) {
				if ($id_topik!=$a->id_topik) {
					$soal = 1;
					$bab = $abjad[$topik];
					$html .= "<br/><hr><br/><h3>$bab. $a->topik";
					// $html .= "<a href='#' class='text-primary ml-2'><i class='fas fa-pen'></i></a>";
					// $html .= "<button onclick='konfirmasiHapus(\"".base_url("master/Aktivitas/hapusTopik/$a->id_topik/$a->id_aktivitas")."\")' class='text-danger btn ml-1' style='background:transparent; border:transparent;'><i class='fas fa-trash'></i></button>";
					$html .= "</h3>";
					$topik++;
				}
				if ($id_soal!=$a->id_soal) {
					$html .= "<br/><h4>$bab"."$soal. $a->soal";
					// $html .= "<a href='#' class='text-primary ml-2'><i class='fas fa-pen'></i></a>";
					$html .= "<button onclick='konfirmasiHapus(\"".base_url("master/Aktivitas/hapusSoal/$a->id_soal/$a->id_aktivitas")."\")' class='text-danger btn ml-1' style='background:transparent; border:transparent;'><i class='fas fa-trash'></i></button>";
					$html .= "</h4>";
					$soal++;
				}
				if ($id_jawaban!=$a->id_jawaban) {
					$html .= "<li style='padding-left:20px;'>$a->jawaban";
					// $html .= "<a href='#' class='text-primary ml-2'><i class='fas fa-pen'></i></a>";
					$html .= "<button onclick='konfirmasiHapus(\"".base_url("master/Aktivitas/hapusJawaban/$a->id_jawaban/$a->id_aktivitas")."\")' class='text-danger btn ml-1' style='background:transparent; border:transparent;'><i class='fas fa-trash'></i></button>";
					$html .= "</li>";
				}
				$id_jawaban = $a->id_jawaban;
				$id_soal = $a->id_soal;
				$id_topik = $a->id_topik;
			}
		}
		$html .= '<br/><br/>';
		$data['list'] = serialize($html);

		$data['page'] = "aktivitas";
		$data['title'] = "Data Aktivitas";
		$this->template->views('admin/lihat_aktivitas', $data);
	}

	// public function hapusTopik($id_topik, $id_aktivitas){
		// $where['id_topik'] = $id_topik;
		// $where2['id_topik'] = $id_topik;
		// $where3['id'] = $id_topik;
		// $result = $this->GeneralApiModel->deleteMaster($where,'masterdata_pilihan_jawaban_aktivitas');
		// $result = $this->GeneralApiModel->deleteMaster($where2,'masterdata_soal_aktivitas');
		// $result = $this->GeneralApiModel->deleteMaster($where3,'masterdata_topik');

	// 	if ($result) {
	// 		$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Topik Sukses</div>');
	// 		redirect(base_url("master/Aktivitas?aktivitas=".$id_aktivitas."&cari=true"));
	// 	}
	// }

	public function hapusSoal($id_soal, $id_aktivitas){
		$where['id_soal'] = $id_soal;
		$where2['id'] = $id_soal;
		$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_pilihan_jawaban_aktivitas');
		$result = $this->GeneralApiModel->deleteMaster($where2,'masterdata_soal_aktivitas');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Soal Sukses</div>');
			redirect(base_url("master/Aktivitas?aktivitas=".$id_aktivitas."&cari=true"));
		}
	}

	public function hapusJawaban($id_jawaban, $id_aktivitas){
		$where['id'] = $id_jawaban;
		$result = $this->GeneralApiModel->deleteMaster($where,'masterdata_pilihan_jawaban_aktivitas');
		if ($result) {
			$this->session->set_flashdata('msg', '<div class="col-md-12 alert alert-success" role="alert">Hapus Jawaban Sukses</div>');
			redirect(base_url("master/Aktivitas?aktivitas=".$id_aktivitas."&cari=true"));
		}
	}
}
