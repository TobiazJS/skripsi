<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dosen extends CI_Model {
	public function all(){
		$this->load->database();
		// $query = $this->db->query("select * from menu_pedagang ORDER BY ? ?", [
		// 	$sortby,
		// 	$sortdir
		// ]);
		return $this->db->get_where('dosen', array('deleted'=>0))->result();
		
	}

	public function isExist($email, $password){
		$this->load->database();
		$where = array(
			'email' => $email,
			'password' => $password
		);
		return $this->db->get_where('dosen', $where)->result();
	}

	public function detil($id){
		$this->load->database();
		$query = $this->db->query("select * from dosen where id = ?", [
			$id
		]);
		return $query->row_array();
	}

	function edit(){
		$this->load->database();
		$id = $_POST['id'];
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$this->db->query("UPDATE `dosen` SET `NIK` = '$nik' , `nama` = '$nama', `email` = '$email', `password` = '$password', `role` = '$role' WHERE (`dosen`.`id` = '$id')");  
	}

	public function insert(){
		$this->load->database();
		$nik = $_POST['nik'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$this->db->query("INSERT INTO dosen 
			(NIK, nama, email, password, role)
			VALUES
			('$nik', '$nama', '$email', '$password', '$role')");
	}

	public function getByEmail($email){
		$this->load->database();
		return $this->db->get_where('dosen', array('email'=>$email))->row_array();
	}
}
?>