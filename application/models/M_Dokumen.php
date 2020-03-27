<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Dokumen extends CI_Model {
  // Fungsi untuk menampilkan semua data gambar
  public function view($id_kegiatan){
    $this->load->database();
    $this->db->select('*');
    $this->db->from('dokumen');
    $this->db->where('kegiatan', $id_kegiatan);
    return $this->db->get()->result();
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload(){
    $config['upload_path'] = './upload/';
    $config['allowed_types'] = '*';
    $config['max_size']  = '0';
    $config['remove_space'] = TRUE;
    $config['file_name'] = uniqid();

    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    $this->upload->initialize($config);
    if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Fungsi untuk menyimpan data ke database
  public function save($upload, $id_kegiatan){
    $data = array(
      //ganti nama files
      'nama' => $upload['file']['file_name'],
      'jenis' => $_POST['jenis'],
      'kegiatan' => $id_kegiatan
    );
    
    $this->db->insert('dokumen', $data);
  }

  public function detil($id){
    $this->load->database();
    return $this->db->get_where('dokumen', ['id'=>$id])->row_array();
  }

  private function delete($id)
  {
    $dt = $this->detil($id);
    if ($dt['nama'] != "10483403609695.jpg") {
      $filename = explode(".", $dt['nama'])[0];
      return array_map('unlink', glob(FCPATH."./upload/$filename.*"));
    }
  }

  public function hapusDokumen($id)
  {
    $this->load->database();
        // $this->db->where('db_id', $db_id);
    $this->delete($id);
    return $this->db->delete('dokumen', ['id' => $id]);
  }

  // public function update(){
  //   $data = [
  //     'id' => $this->input->post('id'),
  //     'jenis' => $this->input->post('jenis'),
  //     if (!empty($_FILES["nama"]["id"])) {
  //       $this->nama = $this->upload(),
  //     }else{
  //       $this->nama = $this->input->post('namalama'),
  //     }
  //   ];
  //   $this->db->where('id', $this->input->post('id'));
  //   $this->db->update('dokumen', $data);
  //   var_dump($this->delete($this->input->post('id'))) ;
  // }
}