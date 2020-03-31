<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kegiatan extends CI_Model {
	public function all($konfirmasi, $status){
		$this->load->database();
		$this->db->order_by('id', 'desc');
		return $this->db->get_where('kegiatan', array('konfirmasi'=>$konfirmasi, 'status'=>$status));
	}

	public function detilPengajuan($id){
		$this->load->database();
		return $this->db->get_where('pengajuan', array('idkegiatan'=>$id))->row();
	}

	public function detil($id){
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->where('id', $id);

		return $this->db->get();
	}

	function edit($data, $id){
		$this->load->database();
		$this->db->update('kegiatan', $data, array('id' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;  
	}

	function delete($id){
		$this->load->database();
		$this->db->delete('kegiatan', array('id'=>$id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	function acc($data, $id){
		$this->load->database();
		$this->db->update('kegiatan', $data, array('id' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function insert($data){
		$this->load->database();
		$this->db->insert('kegiatan', $data);
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function getByDosen($idDosen){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_dosen', $idDosen);

		return $this->db->get();
	}

	 public function editTanggalAkhir($data, $idKegiatan){
		$this->load->database();
		$this->db->update('penugasan', $data, array('id_kegiatan' => $idKegiatan));
	}

	 public function editTanggalAkhir2($data, $idKegiatan){
		$this->load->database();
		$this->db->update('penugasan_mahasiswa', $data, array('id_kegiatan' => $idKegiatan));
	}

	public function search($key, $start, $end, $status, $konfirmasi){
		$this->load->database();		
		//var_dump($this->input->post('key'));
		$que = "SELECT * FROM `kegiatan` WHERE (`status`='$status' AND `konfirmasi`='$konfirmasi')";
		$cari = " AND ((`nama` LIKE '%$key%') OR (`deskripsi` LIKE '%$key%') OR (`tempat` LIKE '%$key%'))";
		$tanggal = " AND ((`tanggal_akhir` BETWEEN '$start' AND '$end') OR (`tanggal_mulai` BETWEEN '$start' AND '$end') OR ((`tanggal_mulai` <= '$start') AND (`tanggal_akhir` >= '$end') ))";
		//$query = $que.$cari.$tanggal;
		//var_dump(($this->input->post('start') != "") && (($this->input->post('end'))!=""));
		$query="";
		if (($this->input->post('key')!="")==true) {
			if ((($this->input->post('start')!="")==true) && ((($this->input->post('end'))!="")==true)) {
				$query = $que.$cari.$tanggal;
			}else{
				$query = $que.$cari;
			}
		}else{
			if ((($this->input->post('start')!="")==true) && ((($this->input->post('end'))!="")==true)) {
				$query = $que.$tanggal;
			}else{
				$query = "tidak ada yang di search";
			}
		}
		// return $this->db->query("SELECT * FROM `kegiatan` WHERE (`status`='$status' AND `konfirmasi`='$konfirmasi') 
		// 	AND ((`nama` LIKE '%$key%') OR (`deskripsi` LIKE '%$key%') OR (`tempat` LIKE '%$key%')) ")
		// ->result();
		//var_dump($query);
		return $this->db->query("$query")->result();


	}

	public function selesai($id){
		$this->load->database();
		$this->db->update('kegiatan', array('status'=>1), array('id'=>$id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	// 
}
?>