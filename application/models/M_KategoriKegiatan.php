<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_KategoriKegiatan extends CI_Model {

	function insert($kegiatan, $kategori){
		$this->load->database();
		$this->db->trans_start();
		$result = array();
		foreach($kategori AS $key => $val){
			$result[] = array(
				'id_kegiatan'   => $_POST['id'],
				'id_kategori'   => $_POST['kategori'][$key]
			);
		}      
            //MULTIPLE INSERT TO DETAIL TABLE
		//var_dump(json_encode($result));
		$this->db->insert_batch('kategori_kegiatan', $result);
		$this->db->trans_complete();
	}

	function see($id_kegiatan){
		return $this->db->get_where('kategorikegiatan', array('idkegiatan'=>$id_kegiatan))->result();
	}

	function delete($id){
		$this->db->delete('kategori_kegiatan', array('id'=>$id));
		return ($this->db->affected_rows() > 0)	? TRUE : FALSE;		
	}

	function getById($id){
		return $this->db->get_where('penugasan', array('id'=>$id))->row();
	}
}
?>