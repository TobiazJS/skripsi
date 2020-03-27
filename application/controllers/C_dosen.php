<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_dosen extends CI_Controller {

	private $getdosen;

	function __construct() {
		parent::__construct();
		$this->load->library('session');
		// $this->acc_indicator = $this->load->view('acc-indicator',[
		// 	'username' => $this->session->userdata('username'),
		// ], true);
		$this->getdosen = $this->M_Dosen->getByEmail($this->session->userdata('email'));
		$this->load->helper('url');
		$this->load->library('user_agent');
	}

	//jabatan
	public function jabatan(){
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->load->model('M_Dosen');
		$jabatan = $this->M_Jabatan->all();
		$dosen = $this->M_Dosen->getByEmail($this->session->userdata('email'));
		$this->load->view('dosen/jabatan.php',[
			'jabatan' => $jabatan,
			'dosen' => $dosen,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'jabatan'
			], true)
		]);
	}

	public function detilJabatan($id){
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$detilJabatan = $this->M_Jabatan->detil($id);
		$this->load->view('dosen/detiljabatan.php',[
			'detilJabatan' => $detilJabatan,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'jabatan'
			], true)
		]);
	}

	public function editJabatan(){
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->M_Jabatan->edit();
		redirect('dosen/jabatan', 'refresh');
	}

	public function insertJabatan(){
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->M_Jabatan->insert();
		redirect('dosen/jabatan', 'refresh');
	}

	public function deleteJabatan($id){
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		if ($this->M_Jabatan->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		}else{
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/jabatan', 'refresh');
	}
	//end jabatan

	//kategori
	public function kategori(){
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$kategori = $this->M_Kategori->all();
		$this->load->view('dosen/kategori.php',[
			'kategori' => $kategori,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'kategori'
			], true)
		]);
	}

	public function detilKategori($id){
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$detilKategori = $this->M_Kategori->detil($id);
		$this->load->view('dosen/detilkategori.php',[
			'detilKategori' => $detilKategori,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'kategori'
			], true)
		]);
	}

	public function editKategori(){
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$this->M_Kategori->edit();
		redirect('dosen/kategori', 'refresh');
	}

	public function insertKategori(){
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$this->M_Kategori->insert();
		redirect('dosen/kategori', 'refresh');
	}

	public function deleteKategori($id){
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		if ($this->M_Kategori->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		}else{
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/kategori', 'refresh');
	}
	//end kategori

	//instansi
	public function instansiDalam(){
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$instansiDalam = $this->M_Instansi->all(0);
		$this->load->view('dosen/instansi.php',[
			'instansi' => $instansiDalam,
			'ses' => 0,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function instansiLuar(){
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$instansiDalam = $this->M_Instansi->all(1);
		$this->load->view('dosen/instansi.php',[
			'instansi' => $instansiDalam,
			'ses' => 1,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function detilInstansi($id){
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$detilInstansi = $this->M_Instansi->detil($id);
		$this->load->view('dosen/detilinstansi.php',[
			'detilInstansi' => $detilInstansi,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function editInstansi($id){
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$this->M_Instansi->edit();
		redirect('dosen/detilinstansi/'.$id, 'refresh');
	}

	public function insertInstansi(){
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$this->M_Instansi->insert();
		redirect('dosen/instansiluar', 'refresh');
	}

	public function deleteInstansi($id){
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		if ($this->M_Instansi->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		}else{
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/instansiluar', 'refresh');
	}

	//end instansi

	//kegiatan

	public function kegiatan(){
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$this->db->order_by('status','asc');
		$kegiatan = $this->db->get_where('transaksi', array('id_dosen'=>$this->getdosen['id'], 'konfirmasi'=>1))->result();
		$where = array(
			'pengaju' => $this->getdosen['id']
		);
		$this->db->order_by('konfirmasi', 'asc');
		$pengajuan = $this->db->get_where('kegiatan', $where)->result();
		$this->load->view('dosen/kegiatan.php',[
			'kegiatan' => $kegiatan,
			'pengajuan' => $pengajuan,
			'topbar' => $this->load->view('kajur/topbar',[],true),
			'sidebar' => $this->load->view('dosen/sidebar',[
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function insertKegiatan(){
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$data = array(
			'nama' => $this->input->post('nama'),
			'tempat' => $this->input->post('tempat'),
			'tanggal_mulai' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_mulai'))),
			'tanggal_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir'))),
			'deskripsi' => $this->input->post('deskripsi'),
			'konfirmasi' => '0',
			'jenis' => '0',
			'instansilain' => $this->input->post('colab'),
			'pengaju' => $this->getdosen['id'],
		);

		if($this->M_Kegiatan->insert($data) == TRUE) {
			$this->session->set_flashdata('tambah', true);
		}
		else {
			$this->session->set_flashdata('tambah', false);
		}
		redirect('dosen/kegiatan', 'refresh');
	}

	public function detilKegiatan($id){
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$this->load->model('M_Instansi');
		$this->load->model('M_Kerjasama');
		$this->load->model('M_Dokumen');
		$this->load->model('M_Dosen');
		$this->load->model('M_Jabatan');
		$this->load->model('M_Penugasan');
		$this->load->model('M_KategoriKegiatan');
		$this->load->model('M_Kategori');
		$detilKegiatan = $this->M_Kegiatan->detil($id);
		$data['kegiatan'] = $this->M_Kegiatan->detil($id)->row();
		$data['topbar'] = $this->load->view('kajur/topbar',[],true);
		$data['sidebar'] = $this->load->view('dosen/sidebar',[
			'nama_hal' => 'kegiatan'
		], true);
		$data['instansi'] = $this->M_Instansi->semua();
		$data['dosen'] = $this->M_Dosen->all();
		$data['jabatan'] = $this->M_Jabatan->all();
		$data['penugasankegiatan'] = $this->M_Penugasan->penugasanToKegiatan($id);
		
		$data['kerjasama'] = $this->M_Kerjasama->see($id);
		$data['kategori'] = $this->M_Kategori->all();
		$data['kategorikegiatan'] = $this->M_KategoriKegiatan->see($id);
		$data1=$this->M_Kerjasama->see($id);
		$data['tugasinbelom'] = $this->db->get_where('transaksi', array('id_dosen'=>$this->getdosen['id'], 'id_kegiatan'=>$id))->result();
		$data['lihatjabatan'] = $this->db->get_where('transaksi', array('id_dosen'=>$this->getdosen['id'], 'id_kegiatan'=>$id))->row();

		foreach ($data1 as $result) {
			$value[] = (float) $result->idinstansi;
		}
		$data['dokumen'] = $this->M_Dokumen->view($id);
		//echo json_encode($data['dokumen']);

		$this->load->view('dosen/detilkegiatan.php', $data);

	}

	public function editKegiatan($id){
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$data = array(
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tempat' => $this->input->post('tempat'),
			'tanggal_mulai' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_mulai'))),
			'tanggal_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir'))),
			'instansilain' => $this->input->post('colab')
		);

		$data2 = array(
			'periode_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir')))
		);

		if($this->M_Kegiatan->edit($data, $id) == TRUE) {
			$this->M_Kegiatan->editTanggalAkhir($data2, $id);
			$this->session->set_flashdata('edit', true);
		}
		else {
			$this->session->set_flashdata('edit', false);
		}
		redirect('dosen/detilkegiatan/'.$id, 'refresh');
	}

	public function deleteKegiatan($id){
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		if ($this->M_Kegiatan->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		}else{
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/kegiatan', 'refresh');
	}

	//end kegiatan

	//kerjasama

	public function insertKerjasama(){
		$this->auth->doAuth();
		$this->load->model('M_Kerjasama');
		$id_kegiatan = $this->input->post('id',TRUE);
		$id_instansi = $this->input->post('instansi',TRUE);
		$this->M_Kerjasama->insert($id_kegiatan,$id_instansi);
		redirect('dosen/detilkegiatan/'.$id_kegiatan, 'refresh');
	}

	//end kerjasama

	//upload

	public function uploadDokumen($id_kegiatan){
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');
		$data = array();

		if($this->input->post('submitupload')){ 
    	// Jika user menekan tombol Submit (Simpan) pada form
      	// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			$upload = $this->M_Dokumen->upload();
			//var_dump($upload);

			if($upload['result'] == "success"){ 
      		// Jika proses upload sukses
         	// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				$this->M_Dokumen->save($upload, $id_kegiatan);

        		redirect('dosen/detilkegiatan/'.$id_kegiatan, 'refresh'); // Redirect kembali ke halaman awal / halaman view data
        	}else{ 
      		// Jika proses upload gagal

       		 $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
       		}
       	}
       }

       public function detilDokumen($id){
       	$this->auth->doAuth();
       	$this->load->model('M_Dokumen');
       	$dokumen = $this->M_Dokumen->detil($id);
       	$this->load->view('kajur/detildokumen.php',[
       		'dokumen' => $dokumen,
       		'topbar' => $this->load->view('kajur/topbar',[],true),
       		'sidebar' => $this->load->view('dosen/sidebar',[
       			'nama_hal' => 'kegiatan'
       		], true)
       	]);
       }

       public function updateDokumen(){
       	$this->auth->doAuth();
       	$this->load->model('M_Dokumen');
       	
       	$this->M_Dokumen->update();

       	redirect('kajur/detilkegiatan/'.$this->input->post('kegiatan'), 'refresh');
       }

       public function deleteDokumen($id){
       	$this->auth->doAuth();
       	$this->load->model('M_Dokumen');
       	$kegiatan = $this->M_Dokumen->detil($id);
       	$this->M_Dokumen->hapusDokumen($id);

       	redirect('dosen/detilkegiatan/'.$kegiatan['kegiatan'], 'refresh');
       }

	//end upload

       //penugasan

       public function insertPenugasan(){
       	$this->auth->doAuth();
       	$this->load->model('M_Penugasan');
       	$this->load->model('M_Kegiatan');
       	$data = array(
       		'id_kegiatan' => $this->input->post('id'),
       		'periode_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('periode_akhir'))),
       		'id_dosen' => $this->input->post('dosen'),
       		'id_jabatan' => $this->input->post('jabatan')
       	);
       	//var_dump(json_encode($data));

       	if($this->M_Penugasan->insert($data) == TRUE) {
       		$this->session->set_flashdata('tambah', true);
       	}
       	else {
       		$this->session->set_flashdata('tambah', false);
       	}
       	redirect('dosen/detilkegiatan/'.$this->input->post('id'), 'refresh');
       }

       public function detilPenugasan($id){
       	$this->auth->doAuth();
       	$this->load->model('M_Penugasan');
       	$this->load->model('M_Jabatan');
       	$this->load->model('M_Dosen');
       	$penugasan = $this->M_Penugasan->detil($id);
       	$jabatan = $this->M_Jabatan->all();
       	$dosen = $this->M_Dosen->all();
       	$this->load->view('kajur/detilpenugasan.php',[
       		'penugasan' => $penugasan,
       		'jabatan' => $jabatan,
       		'dosen' => $dosen,
       		'topbar' => $this->load->view('kajur/topbar',[],true),
       		'sidebar' => $this->load->view('dosen/sidebar',[
       			'nama_hal' => 'kegiatan'
       		], true)
       	]);
       }

       public function editPenugasan($id){
       	$this->auth->doAuth();
       	$this->load->model('M_Penugasan');
       	$data = array(
			// 'nama' => $this->input->post('nama'),
			// 'deskripsi' => $this->input->post('deskripsi'),
			// 'tempat' => $this->input->post('tempat'),
			// 'tanggal_mulai' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_mulai'))),
			// 'tanggal_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir'))),
			// 'jenis' => $this->input->post('jenis')
       		'id_dosen' =>$this->input->post('dosen'),
       		'id_jabatan' => $this->input->post('jabatan')
       	);

       	if($this->M_Penugasan->edit($data, $id) == TRUE) {
       		$this->session->set_flashdata('edit', true);
       	}
       	else {
       		$this->session->set_flashdata('edit', false);
       	}
       	redirect('dosenpenugasan/detil/'.$id, 'refresh');
       }

       public function deletePenugasan($id){
       	$this->auth->doAuth();
       	$this->load->model('M_KategoriKegiatan');
       	$idkegiatan = $this->M_KategoriKegiatan->getById($id);
       	$this->db->delete('penugasan', array('id'=>$id));
       	redirect('dosen/detilkegiatan/'.$idkegiatan->id_kegiatan, 'refresh');
       }

       //kategori kegiatan

       public function insertKategoriKegiatan(){
       	$this->auth->doAuth();
       	$this->load->model('M_KategoriKegiatan');
       	$id_kegiatan = $this->input->post('id', TRUE);
       	$id_kategori = $this->input->post('kategori', TRUE);
       	$this->M_KategoriKegiatan->insert($id_kegiatan, $id_kategori);
       	redirect('dosen/detilkegiatan/'.$id_kegiatan, 'refresh');
       }

       public function deleteKategoriKegiatan($id){
       	$this->auth->doAuth();
       	$this->load->model('M_KategoriKegiatan');
       	$idkegiatan = $this->M_KategoriKegiatan->getById($id);
		//var_dump(json_encode($idkegiatan->id_kegiatan));
       	$this->M_KategoriKegiatan->delete($id);
       	redirect('dosen/detilkegiatan/'.$idkegiatan->id_kegiatan, 'refresh');
       }

	//end kategori kegiatan

       //kolaborasi

       public function kolaborasi(){
       	$this->auth->doAuth();
       	$kolaborasi = $this->db->get_where('keterlibatan', array('id >'=>'0'))->result();
       	$data['kolaborasi'] = $kolaborasi;
       	$data['topbar'] = $this->load->view('kajur/topbar',[],true);
		$data['sidebar'] = $this->load->view('dosen/sidebar',[
			'nama_hal' => 'kolaborasi'
		], true);
		$this->load->view('dosen/keterlibatan.php', $data);
       }

       public function deleteKolaborasi($id){
       	$this->auth->doAuth();
       	$this->db->delete('keterlibatan', array('id'=>$id));
       	redirect('dosen/kolaborasi', 'refresh');
       }

       public function insertKolaborasi(){
       	$this->auth->doAuth();
       	$data = array(
       		'nama' => $this->input->post('nama')
       	);
       	$this->db->insert('keterlibatan', $data);
       	redirect('dosen/kolaborasi', 'refresh');
       }

       public function detilKolaborasi($id){
       	$this->auth->doAuth();
       	$colab = $this->db->get_where('keterlibatan', array('id'=>$id))->row();
       	$data['colab'] = $colab;
       	$data['topbar'] = $this->load->view('kajur/topbar',[],true);
		$data['sidebar'] = $this->load->view('dosen/sidebar',[
			'nama_hal' => 'kolaborasi'
		], true);
		$this->load->view('dosen/detilketerlibatan.php', $data);
       }

       public function editKolaborasi(){
       	$this->auth->doAuth();
       	$id = $this->input->post('id');
       	$data = array(
       		'nama' => $this->input->post('nama')
       	);
       	$this->db->update('keterlibatan', $data, array('id' => $id));
       	redirect('dosen/detilkolaborasi/'.$id, 'refresh');
       }

       //end kolaborasi
   }
