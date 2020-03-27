<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Instansi extends CI_Model {
  public function all($jenis){
    $this->load->database();
    // $query = $this->db->query("select * from menu_pedagang ORDER BY ? ?", [
    //  $sortby,
    //  $sortdir
    // ]);
    $query = $this->db->query("select * from instansi WHERE (`instansi`.`jenis` = '$jenis')");
    return $query->result();
    
  }

  public function semua(){
    $this->load->database();
    $query = $this->db->get('instansi');
    return $query;
  }

  public function detil($id){
    $this->load->database();
    $query = $this->db->query("select * from instansi WHERE id = ?", [
      $id
    ]);
    return $query->row_array();
  }

  public function edit(){
    $this->load->database();
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $this->db->query("UPDATE `instansi` SET `nama` = '$nama',`jenis` = '$jenis' WHERE (`instansi`.`id` = '$id')");  
  }

  public function insert(){
    $this->load->database();
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $this->db->query("INSERT INTO instansi 
      (nama, jenis)
      VALUES
      ('$nama', '$jenis')");
  }

   public function delete($id){
    $this->load->database();
    $this->db->delete('instansi', array('id'=>$id));
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }
}
?>