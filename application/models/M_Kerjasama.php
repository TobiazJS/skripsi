<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kerjasama extends CI_Model {
	function insert($kegiatan, $instansi){
		$this->load->database();
		// $this->db->trans_start();
		$result = array(
			'id_kegiatan'   => $_POST['id'],
			'id_instansi'   => $_POST['instansi'],
			'id_keterlibatan' => $_POST['terlibat'],
			'keterangan'	=> $_POST['ket']
		);
		     
            //MULTIPLE INSERT TO DETAIL TABLE
		//var_dump(json_encode($result));
		$this->db->insert('kerjasama', $result);
		//$this->db->trans_complete();
	}

	function see($id_kegiatan){
		return $this->db->get_where('kerjasama_acara', array('idkegiatan'=>$id_kegiatan))->result();
	}

	function delete($id){
		$this->db->delete('kerjasama', array('id'=>$id));
		return ($this->db->affected_rows() > 0)	? TRUE : FALSE;		
	}

	function getById($id){
		return $this->db->get_where('kerjasama', array('id'=>$id))->row();
	}
}
?>