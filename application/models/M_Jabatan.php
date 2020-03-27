<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jabatan extends CI_Model {
	public function all(){
		$this->load->database();
		// $query = $this->db->query("select * from menu_pedagang ORDER BY ? ?", [
		// 	$sortby,
		// 	$sortdir
		// ]);
		$query = $this->db->query("select * from jabatan");
		return $query->result();
		
	}



	public function detil($id){
		$this->load->database();
		$query = $this->db->query("select * from jabatan where id = ?", [
			$id
		]);
		return $query->row_array();
	}

	function edit(){
		$this->load->database();
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$this->db->query("UPDATE `jabatan` SET `nama` = '$nama' WHERE (`jabatan`.`id` = '$id')");  
	}

	function delete($id){
		$this->load->database();
		$this->db->delete('jabatan', array('id'=>$id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function insert(){
		$this->load->database();
		$nama = $_POST['nama'];
		$this->db->query("INSERT INTO jabatan 
			(nama)
			VALUES
			('$nama')");
	}
}
?>