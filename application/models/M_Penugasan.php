<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penugasan extends CI_Model{
	
	public function penugasanToKegiatan($idKegiatan){
		$this->load->database();
		//var_dump(json_encode($this->db->get('transaksi')->result()));
		$this->db->where('idkegiatan', $idKegiatan);
		return $this->db->get('transaksi')->result();
	}

	public function insert($data){
		$this->load->database();
		$this->db->insert('penugasan', $data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function insertMhs($data){
		$this->load->database();
		$this->db->insert('penugasan_mahasiswa', $data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function detil($id){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('idpenugasan', $id);
		//var_dump(json_encode($this->db->get()->result()));
		return $this->db->get()->row();
	}

	function edit($data, $id){
		$this->load->database();
		$this->db->update('penugasan', $data, array('id' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;  
	}

	function getById($id){
		return $this->db->get_where('penugasan', array('id'=>$id))->row();
	}
}