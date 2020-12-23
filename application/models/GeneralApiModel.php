<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralApiModel extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    /* -------------------------------- API UNTUK WEB ---------------------- */

    function getAllMaster($tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        $query = $db->get($tabel);
        return $query;
    }

    function getWhereMaster($data, $tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        $query = $db->get_where($tabel, $data);
        return $query;
    }

    function getWhereMasterOrdered($data, $title, $order,$tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        $query = $db->from($tabel)->where($data)->order_by($title, $order)->get();
        return $query;
    }

    function insertMaster($data, $tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        $db->trans_begin();

        $db->insert($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function insertIdMaster($data, $tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        $db->trans_begin();

        $db->insert($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }else{
            $insert_id = $db->insert_id();
            $db->trans_commit();
        }
        return $insert_id;
    }

    function insertBatchMaster($data, $tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        $db->trans_begin();

        $db->insert_batch($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function updateMaster($data, $id, $tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        $db->trans_begin();

        $db->where($id);
        $db->update($tabel, $data);
        //$db->insert('masterdata_Pelatihan', $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function deleteMaster($data, $tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);

        $db->trans_begin();

        $db->delete($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function isDataMasterExist($array_data, $tabel){
        $db = $this->load->database('mhsc_masterdata', TRUE);
        if($db->get_where($tabel, $array_data)->result()){
            return true;
        }
        else{
            return false;
        }
    }

    function getAllTransactional($tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $query = $db->get($tabel);
        return $query;
    }

    function getWhereTransactional($data, $tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $query = $db->get_where($tabel, $data);
        return $query;
    }

    function getKelasPemateri($id_kelas){
      $this->db->select('*, COUNT(id_panitia) as jumlah_materi');
      $this->db->where(array('id_kelas'=>$id_kelas));
      $this->db->group_by('id_panitia');
      $query = $this->db->get('detail_kelas_pemateri');
      return $query->result();
    }

    function getWhereTransactionalOrdered($data, $title, $order,$tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $query = $db->from($tabel)->where($data)->order_by($title, $order)->get();
        return $query;
    }

    function getOneWhereTransactionalOrdered($data, $title, $order,$tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $query = $db->from($tabel)->where($data)->order_by($title, $order)->limit(1)->get();
        return $query;
    }

    function insertTransactional($data, $tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $db->trans_begin();

        $db->insert($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function insertIdTransactional($data, $tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $db->trans_begin();

        $db->insert($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $insert_id = $db->insert_id();
            $db->trans_commit();
        }

        return $insert_id;
    }

    function insertBatchTransactional($data, $tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $db->trans_begin();

        $db->insert_batch($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function updateTransactional($data, $id, $tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $db->trans_begin();

        $db->where($id);
        $db->update($tabel, $data);
        //$db->insert('masterdata_Pelatihan', $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function deleteTransactional($data, $tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);

        $db->trans_begin();

        $db->delete($tabel, $data);

        $status = $db->trans_status();

        if ($status === FALSE){
            $db->trans_rollback();
        }
        else{
            $db->trans_commit();
        }
        return $status;
    }

    function isDataTransactionalExist($array_data, $tabel){
        $db = $this->load->database('mhsc_transactional', TRUE);
        $query = $db->get_where($tabel, $array_data)->result();
        if(!empty($query)){
            return true;
        }
        else{
            return false;
        }
    }

  	public function upload_file($filename){
      $tipe = 0;
  		$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      if ($file_ext=="jpg" || $file_ext=="png" || $file_ext=="jpeg") {
        $tipe = 1;
      } elseif ($file_ext=="mp4" || $file_ext=="mov" || $file_ext=="wmv" || $file_ext=="mkv") {
        $tipe = 2;
      } elseif ($file_ext=="pdf") {
        $tipe = 3;
      }
  		$new_name = time().'.'.$file_ext;

      $config['upload_path'] = base_url("assets/materi");
      // $config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size']      = '0';
  		$config['file_name'] = $new_name;

  		$this->load->library('upload', $config, 'files');
  		$this->files->initialize($config);
  		$this->files->do_upload('files');
  	}
}
