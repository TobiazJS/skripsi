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
		$this->db->order_by('status', 'ASC');

		return $this->db->get();
	}

	public function cnt($idDosen){
		$this->load->database();
		return $this->db->get_where('transaksi', array('id_dosen'=>$idDosen, 'status'=>0))->result();

		//return $this->db->get()->result();
	}

	 public function editTanggalAkhir($data, $idKegiatan){
		$this->load->database();
		$this->db->update('penugasan', $data, array('id_kegiatan' => $idKegiatan));
	}

	 public function editTanggalAkhir2($data, $idKegiatan){
		$this->load->database();
		$this->db->update('penugasan_mahasiswa', $data, array('id_kegiatan' => $idKegiatan));
	}

	public function search($key, $start, $end, $status, $konfirmasi, $jenis, $mahasiswa, $sumber){
		$this->load->database();		
		
		$que = "SELECT * FROM `kegiatan` WHERE (`status`='$status' AND `konfirmasi`='$konfirmasi')";
		$cari = " AND ((`nama` LIKE '%$key%' OR `tempat` LIKE '%$key%'))";
		$tanggal = " AND (((`tanggal_akhir` BETWEEN '$start' AND '$end') OR (`tanggal_mulai` BETWEEN '$start' AND '$end')) OR ((`tanggal_mulai` <= '$start') AND (`tanggal_akhir` >= '$end')))";
		$jns = " AND (`jenis` = '$jenis')";
		$mhs = " AND (`melibatkanmahasiswa` = $mahasiswa)";
		$biaya = " AND (`sumberbiaya` = '$sumber')";
		
		

		if ($this->input->post('key')!="") {
			$que = $que.$cari;
		}
		if ($this->input->post('start')!="" && $this->input->post('end')!="") {
			$que = $que.$tanggal;
		}
		if ($jenis!="") {
			$que = $que.$jns;
		}
		if ($mahasiswa!="") {
			$que = $que.$mhs;
		}
		if ($sumber!="") {
			$que = $que.$biaya;
		}
		
		return $this->db->query("$que")->result();
	}

	public function selesai($id){
		$this->load->database();
		$this->db->update('kegiatan', array('status'=>1), array('id'=>$id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	// 
}
