<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kategori extends CI_Model {
	public function all(){
		$this->load->database();
		// $query = $this->db->query("select * from menu_pedagang ORDER BY ? ?", [
		// 	$sortby,
		// 	$sortdir
		// ]);
		$query = $this->db->query("select * from kategori");
		return $query->result();
		
	}

	public function detil($id){
		$this->load->database();
		$query = $this->db->query("select * from kategori where id = ?", [
			$id
		]);
		return $query->row_array();
	}

	function edit(){
		$this->load->database();
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$jenis = $_POST['jenis'];
		$this->db->query("UPDATE `kategori` SET `nama` = '$nama', `jenis` = '$jenis' WHERE (`kategori`.`id` = '$id')");  
	}

	function delete($id){
		$this->load->database();
		$this->db->delete('kategori', array('id'=>$id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
 	}

	public function insert(){
		$this->load->database();
		$nama = $_POST['nama'];
		$jenis = $_POST['jenis'];
		$this->db->query("INSERT INTO kategori 
			(nama, jenis)
			VALUES
			('$nama', '$jenis')");
	}
}
?>