<?php
defined('BASEPATH') or exit('No direct script access allowed');


class C_dosen extends CI_Controller
{

	private $getdosen;

	function __construct()
	{
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
	public function jabatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->load->model('M_Dosen');
		$jabatan = $this->M_Jabatan->all();
		$dosen = $this->M_Dosen->getByEmail($this->session->userdata('email'));
		$this->load->view('dosen/jabatan.php', [
			'jabatan' => $jabatan,
			'dosen' => $dosen,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'jabatan'
			], true)
		]);
	}

	public function detilJabatan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$detilJabatan = $this->M_Jabatan->detil($id);
		$this->load->view('dosen/detiljabatan.php', [
			'detilJabatan' => $detilJabatan,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'jabatan'
			], true)
		]);
	}

	public function editJabatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->M_Jabatan->edit();
		redirect('dosen/jabatan', 'refresh');
	}

	public function insertJabatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->M_Jabatan->insert();
		redirect('dosen/jabatan', 'refresh');
	}

	public function deleteJabatan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		if ($this->M_Jabatan->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		} else {
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/jabatan', 'refresh');
	}
	//end jabatan

	//kategori
	public function kategori()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$kategori = $this->M_Kategori->all();
		$this->load->view('dosen/kategori.php', [
			'kategori' => $kategori,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'kategori'
			], true)
		]);
	}

	public function detilKategori($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$detilKategori = $this->M_Kategori->detil($id);
		$this->load->view('dosen/detilkategori.php', [
			'detilKategori' => $detilKategori,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'kategori'
			], true)
		]);
	}

	public function editKategori()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$this->M_Kategori->edit();
		redirect('dosen/kategori', 'refresh');
	}

	public function insertKategori()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$this->M_Kategori->insert();
		redirect('dosen/kategori', 'refresh');
	}

	public function deleteKategori($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		if ($this->M_Kategori->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		} else {
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/kategori', 'refresh');
	}
	//end kategori

	//instansi
	public function instansiDalam()
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$instansiDalam = $this->M_Instansi->all(0);
		$this->load->view('dosen/instansi.php', [
			'instansi' => $instansiDalam,
			'ses' => 0,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function instansiLuar()
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$instansiDalam = $this->M_Instansi->all(1);
		$this->load->view('dosen/instansi.php', [
			'instansi' => $instansiDalam,
			'ses' => 1,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function detilInstansi($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$detilInstansi = $this->M_Instansi->detil($id);
		$this->load->view('dosen/detilinstansi.php', [
			'detilInstansi' => $detilInstansi,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function editInstansi($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$this->M_Instansi->edit();
		redirect('dosen/detilinstansi/' . $id, 'refresh');
	}

	public function insertInstansi()
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$this->M_Instansi->insert();
		redirect('dosen/instansiluar', 'refresh');
	}

	public function deleteInstansi($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		if ($this->M_Instansi->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		} else {
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/instansiluar', 'refresh');
	}

	//end instansi

	//kegiatan

	public function kegiatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$this->db->order_by('status', 'asc');
		$kegiatan = $this->db->get_where('transaksi', array('id_dosen' => $this->getdosen['id'], 'konfirmasi' => 1))->result();
		$where = array(
			'pengaju' => $this->getdosen['id']
		);
		$this->db->order_by('konfirmasi', 'asc');
		$pengajuan = $this->db->get_where('kegiatan', $where)->result();

		$where2 = array(
			'pengaju' => $this->getdosen['id'],
			'konfirmasi' => 2
		);
		$this->db->order_by('konfirmasi', 'asc');
		$ditolak = $this->db->get_where('kegiatan', $where2)->result();
		$this->load->view('dosen/kegiatan.php', [
			'kegiatan' => $kegiatan,
			'pengajuan' => $pengajuan,
			'ditolak' => $ditolak,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function insertKegiatan()
	{
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
			'melibatkanmahasiswa' => $this->input->post('mhs'),
			'sumberbiaya' => $this->input->post('sumberbiaya'),
			'pengaju' => $this->getdosen['id'],
		);

		if ($this->M_Kegiatan->insert($data) == TRUE) {
			$this->session->set_flashdata('tambah', true);
		} else {
			$this->session->set_flashdata('tambah', false);
		}

		$email = $this->M_Dosen->detil($this->input->post('dosen'));
		// print_r($email['email']);

		// $from_email = "tobiasjaya3@gmail.com";
		// $to_email = "tobiasjaya3@gmail.com";
		$namakegiatan = $this->input->post('nama');
		$idkegiatan = $this->input->post('id');
		$config = array(
			'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'tobiasjaya3@gmail.com',  // Email gmail
            'smtp_pass'   => 'apalotot',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('tobiasjaya3@gmail.com', 'SI pengelolaan kegiatan IF UNPAR');
		$this->email->to('tobiasjaya3@gmail.com');
		$this->email->subject('Pengajuan Kegiatan '.$namakegiatan);
		$role = "";
		if($email['role']==0){
			$role = "kajur";
		}else{
			$role = "dosen";
		}
		$this->email->message('Terdapat pengajuan kegiatan baru bernama "'.$namakegiatan.'". Pergi ke halaman http://localhost/skripsi/kajur/pengajuan untuk melihat detailnya.');
		//Send mail 
		//print_r($this->email->send());
		if ($this->email->send()) {
			$this->session->set_flashdata("notif", "Email berhasil terkirim.");
			//echo "Ok";
		} else {
			$this->session->set_flashdata("notif", "Email gagal dikirim.");
			//echo "nok";
			//$this->load->view(‘home’);
		}

		redirect('dosen/kegiatan', 'refresh');
	}

	public function detilKegiatan($id)
	{
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
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		$data['sidebar'] = $this->load->view('dosen/sidebar', [
			'nama_hal' => 'kegiatan'
		], true);
		$data['instansi'] = $this->M_Instansi->semua();
		$data['dosen'] = $this->M_Dosen->all();
		$data['jabatan'] = $this->M_Jabatan->all();
		$data['penugasankegiatan'] = $this->M_Penugasan->penugasanToKegiatan($id);

		$data['kerjasama'] = $this->M_Kerjasama->see($id);
		$data['kategori'] = $this->M_Kategori->all();
		$data['kategorikegiatan'] = $this->M_KategoriKegiatan->see($id);
		$data1 = $this->M_Kerjasama->see($id);
		$data['tugasinbelom'] = $this->db->get_where('transaksi', array('id_dosen' => $this->getdosen['id'], 'id_kegiatan' => $id))->result();
		$data['lihatjabatan'] = $this->db->get_where('transaksi', array('id_dosen' => $this->getdosen['id'], 'id_kegiatan' => $id))->row();
		$data['mahasiswa'] = $this->db->get('mahasiswa')->result();
		$data['penugasanmahasiswa'] = $this->db->get_where('penugasan_mhs', array('id_kegiatan' => $id))->result();
		$data['keterlibatan'] = $this->db->get_where('keterlibatan', array('id >' => '0'))->result();

		foreach ($data1 as $result) {
			$value[] = (float) $result->idinstansi;
		}
		$data['dokumen'] = $this->M_Dokumen->view($id);
		//echo json_encode($data['dokumen']);

		$this->load->view('dosen/detilkegiatan.php', $data);
	}

	public function editKegiatan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$data = array(
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tempat' => $this->input->post('tempat'),
			'tanggal_mulai' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_mulai'))),
			'tanggal_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir'))),
			'instansilain' => $this->input->post('colab'),
			'melibatkanmahasiswa' => $this->input->post('mhs'),
			'sumberbiaya' => $this->input->post('sumberbiaya')
		);

		$data2 = array(
			'periode_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir')))
		);

		if ($this->M_Kegiatan->edit($data, $id) == TRUE) {
			$this->M_Kegiatan->editTanggalAkhir($data2, $id);
			$this->M_Kegiatan->editTanggalAkhir2($data2, $id);
			$this->session->set_flashdata('edit', true);
		} else {
			$this->session->set_flashdata('edit', false);
		}
		redirect('dosen/detilkegiatan/' . $id, 'refresh');
	}

	public function deleteKegiatan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		if ($this->M_Kegiatan->delete($id) == TRUE) {
			$this->session->set_flashdata('delete', true);
		} else {
			$this->session->set_flashdata('delete', false);
		}
		redirect('dosen/kegiatan', 'refresh');
	}

	//end kegiatan

	//kerjasama

	public function insertKerjasama()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kerjasama');
		$id_kegiatan = $this->input->post('id', TRUE);
		$id_instansi = $this->input->post('instansi', TRUE);
		$this->M_Kerjasama->insert($id_kegiatan, $id_instansi);
		redirect('dosen/detilkegiatan/' . $id_kegiatan, 'refresh');
	}

	//end kerjasama

	//upload

	public function uploadDokumen($id_kegiatan)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');
		$nama = $this->input->post('a') . $this->input->post('id');

		if ($this->input->post('jenis') == 0) {
			$nama = $nama . "_undangan_kegiatan";
		}
		if ($this->input->post('jenis') == 1) {
			$nama = $nama . "_proposal_kegiatan";
		}
		if ($this->input->post('jenis') == 2) {
			$nama = $nama . "_laporan_kegiatan";
		}
		if ($this->input->post('jenis') == 3) {
			$nama = $nama . "_dokumentasi_kegiatan";
		}
		$data = array();

		if ($this->input->post('submitupload')) {
			// Jika user menekan tombol Submit (Simpan) pada form
			// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			$upload = $this->M_Dokumen->upload($nama);
			//var_dump($upload);

			if ($upload['result'] == "success") {
				// Jika proses upload sukses
				// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				$this->M_Dokumen->save($upload, $id_kegiatan);

				//email notification

				$email = $this->M_Dosen->detil($this->input->post('dosen'));
				// print_r($email['email']);

				// $from_email = "tobiasjaya3@gmail.com";
				// $to_email = "tobiasjaya3@gmail.com";
				$namakegiatan = $this->input->post('a');
				$idkegiatan = $this->input->post('id');
				$config = array(
					'mailtype'  => 'html',
					'charset'   => 'utf-8',
					'protocol'  => 'smtp',
					'smtp_host' => 'smtp.gmail.com',
					'smtp_user' => 'tobiasjaya3@gmail.com',  // Email gmail
					'smtp_pass'   => 'apalotot',  // Password gmail
					'smtp_crypto' => 'ssl',
					'smtp_port'   => 465,
					'crlf'    => "\r\n",
					'newline' => "\r\n"
				);

				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from('tobiasjaya3@gmail.com', 'SI pengelolaan kegiatan IF UNPAR');
				$this->email->to('tobiasjaya3@gmail.com');
				$this->email->subject('Input Dokumen Kegiatan ' . $namakegiatan);
				$role = "";
				if ($email['role'] == 0) {
					$role = "kajur";
				} else {
					$role = "dosen";
				}
				$this->email->message('Dokumen baru dengan nama "'.$nama.'" telah ditambahkan di kegiatan "' . $namakegiatan . '". Pergi ke halaman http://localhost/skripsi/kajur/detilkegiatan/' . $idkegiatan . ' untuk melihat detailnya.');
				//Send mail 
				//print_r($this->email->send());
				if ($this->email->send()) {
					$this->session->set_flashdata("notif", "Email berhasil terkirim.");
					//echo "Ok";
				} else {
					$this->session->set_flashdata("notif", "Email gagal dikirim.");
					//echo "nok";
					//$this->load->view(‘home’);
				}

				//end email

				redirect('dosen/detilkegiatan/' . $id_kegiatan, 'refresh'); // Redirect kembali ke halaman awal / halaman view data
			} else {
				// Jika proses upload gagal

				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				echo $data['message'];
				echo anchor('dosen/detilkegiatan/' . $id_kegiatan, 'Kembali');
			}
		}
	}

	public function detilDokumen($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');
		$dokumen = $this->M_Dokumen->detil($id);
		$this->load->view('dosen/detildokumen.php', [
			'dokumen' => $dokumen,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function updateDokumen()
	{
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');

		$this->M_Dokumen->update();

		redirect('kajur/detilkegiatan/' . $this->input->post('kegiatan'), 'refresh');
	}

	public function deleteDokumen($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');
		$kegiatan = $this->M_Dokumen->detil($id);
		$this->M_Dokumen->hapusDokumen($id);

		redirect('dosen/detilkegiatan/' . $kegiatan['kegiatan'], 'refresh');
	}

	//end upload

	//penugasan

	public function insertPenugasan()
	{
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

		if ($this->M_Penugasan->insert($data) == TRUE) {
			$this->session->set_flashdata('tambah', true);
		} else {
			$this->session->set_flashdata('tambah', false);
		}

		$email = $this->M_Dosen->detil($this->input->post('dosen'));
		$namakegiatan = $this->input->post('namekegiatan');
		$idkegiatan = $this->input->post('id');

		$config = array(
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'tobiasjaya3@gmail.com',  // Email gmail
			'smtp_pass'   => 'apalotot',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('tobiasjaya3@gmail.com', 'SI pengelolaan kegiatan IF UNPAR');
		$this->email->to('tobiasjaya3@gmail.com');
		$this->email->subject('Penugasan Kegiatan ' . $namakegiatan);
		$role = "";
		if ($email['role'] == 0) {
			$role = "kajur";
		} else {
			$role = "dosen";
		}
		$this->email->message('Anda telah ditugaskan di kegiatan "' . $namakegiatan . '". Pergi ke halaman http://localhost/skripsi/' . $role . '/detilkegiatan/' . $idkegiatan . ' untuk melihat detailnya.');
		//Send mail 
		//print_r($this->email->send());
		if ($this->email->send()) {
			$this->session->set_flashdata("notif", "Email berhasil terkirim.");
			//echo "Ok";
		} else {
			$this->session->set_flashdata("notif", "Email gagal dikirim.");
			//echo "nok";
			//$this->load->view(‘home’);
		}

		redirect('dosen/detilkegiatan/' . $this->input->post('id'), 'refresh');
	}

	public function insertPenugasanMhs()
	{
		$this->auth->doAuth();
		$this->load->model('M_Penugasan');
		$this->load->model('M_Kegiatan');
		$data = array(
			'id_kegiatan' => $this->input->post('id'),
			'periode_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('periode_akhir'))),
			'npm' => $this->input->post('mahasiswa'),
			'id_jabatan' => $this->input->post('jabatan')
		);
		//var_dump(json_encode($data));

		if ($this->M_Penugasan->insertMhs($data) == TRUE) {
			$this->session->set_flashdata('tambah', true);
		} else {
			$this->session->set_flashdata('tambah', false);
		}
		redirect('dosen/detilkegiatan/' . $this->input->post('id'), 'refresh');
	}

	public function deletePenugasanMhs($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$idkegiatan = $this->db->get_where('penugasan_mahasiswa', array('id' => $id))->row();
		$this->db->delete('penugasan_mahasiswa', array('id' => $id));
		redirect('dosen/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
	}

	public function detilPenugasan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Penugasan');
		$this->load->model('M_Jabatan');
		$this->load->model('M_Dosen');
		$penugasan = $this->M_Penugasan->detil($id);
		$jabatan = $this->M_Jabatan->all();
		$dosen = $this->M_Dosen->all();
		$this->load->view('dosen/detilpenugasan.php', [
			'penugasan' => $penugasan,
			'jabatan' => $jabatan,
			'dosen' => $dosen,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('dosen/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function editPenugasan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Penugasan');
		$data = array(
			'id_dosen' => $this->input->post('dosen'),
			'id_jabatan' => $this->input->post('jabatan')
		);

		if ($this->M_Penugasan->edit($data, $id) == TRUE) {
			$this->session->set_flashdata('edit', true);
		} else {
			$this->session->set_flashdata('edit', false);
		}
		redirect('dosenpenugasan/detil/' . $id, 'refresh');
	}

	public function deletePenugasan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$idkegiatan = $this->M_KategoriKegiatan->getById($id);
		$this->db->delete('penugasan', array('id' => $id));
		redirect('dosen/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
	}

	//kategori kegiatan

	public function insertKategoriKegiatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$id_kegiatan = $this->input->post('id', TRUE);
		$id_kategori = $this->input->post('kategori', TRUE);
		$this->M_KategoriKegiatan->insert($id_kegiatan, $id_kategori);
		redirect('dosen/detilkegiatan/' . $id_kegiatan, 'refresh');
	}

	public function deleteKategoriKegiatan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$idkegiatan = $this->M_KategoriKegiatan->getById($id);
		//var_dump(json_encode($idkegiatan->id_kegiatan));
		$this->M_KategoriKegiatan->delete($id);
		redirect('dosen/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
	}

	//end kategori kegiatan

	//kolaborasi

	public function kolaborasi()
	{
		$this->auth->doAuth();
		$kolaborasi = $this->db->get_where('keterlibatan', array('id >' => '0'))->result();
		$data['kolaborasi'] = $kolaborasi;
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		$data['sidebar'] = $this->load->view('dosen/sidebar', [
			'nama_hal' => 'kolaborasi'
		], true);
		$this->load->view('dosen/keterlibatan.php', $data);
	}

	public function deleteKolaborasi($id)
	{
		$this->auth->doAuth();
		$this->db->delete('keterlibatan', array('id' => $id));
		redirect('dosen/kolaborasi', 'refresh');
	}

	public function insertKolaborasi()
	{
		$this->auth->doAuth();
		$data = array(
			'nama' => $this->input->post('nama')
		);
		$this->db->insert('keterlibatan', $data);
		redirect('dosen/kolaborasi', 'refresh');
	}

	public function detilKolaborasi($id)
	{
		$this->auth->doAuth();
		$colab = $this->db->get_where('keterlibatan', array('id' => $id))->row();
		$data['colab'] = $colab;
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		$data['sidebar'] = $this->load->view('dosen/sidebar', [
			'nama_hal' => 'kolaborasi'
		], true);
		$this->load->view('dosen/detilketerlibatan.php', $data);
	}

	public function editKolaborasi()
	{
		$this->auth->doAuth();
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama')
		);
		$this->db->update('keterlibatan', $data, array('id' => $id));
		redirect('dosen/detilkolaborasi/' . $id, 'refresh');
	}

	//end kolaborasi
}
