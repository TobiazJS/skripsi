<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kajur extends CI_Controller
{
	private $getdosen;

	public function __construct()
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

	//Dosen

	public function dosen()
	{
		$this->auth->doAuth();
		$this->load->model('M_Dosen');
		$this->load->model('M_Kegiatan');
		$dosen = $this->M_Dosen->all();
		$cnt = array();
		foreach ($dosen as $id) {
			array_push($cnt, count($this->M_Kegiatan->cnt($id->id)));
		}
		$this->load->view('kajur/dosen.php', [
			'dosen' => $dosen,
			'cnt' => $cnt,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'dosen'
			], true)
		]);
	}

	public function detilDosen($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dosen');
		$this->load->model('M_Kegiatan');
		$detilDosen = $this->M_Dosen->detil($id);
		$riwayat = $this->M_Kegiatan->getByDosen($id)->result();
		$cnt = count($this->M_Kegiatan->cnt($id));
		$tot = count($riwayat);
		$this->load->view('kajur/detildosen.php', [
			'detilDosen' => $detilDosen,
			'cnt' => $cnt,
			'tot' => $tot,
			'riwayat' => $riwayat,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'dosen'
			], true)
		]);
	}

	public function editDosen($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dosen');
		$this->M_Dosen->edit();
		redirect('kajur/detildosen/' . $id, 'refresh');
	}

	public function insertDosen()
	{
		$this->auth->doAuth();
		$this->load->model('M_Dosen');
		$this->M_Dosen->insert();
		redirect('kajur/dosen', 'refresh');
	}

	public function hapusDosen($id)
	{
		$this->auth->doAuth();
		$data = array(
			'deleted' => 1
		);
		$this->db->update('dosen', $data, array('id' => $id));
		redirect('kajur/dosen', 'refresh');
	}

	//end Dosen

	//jabatan
	public function jabatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$jabatan = $this->M_Jabatan->all();
		$this->load->view('kajur/jabatan.php', [
			'jabatan' => $jabatan,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'jabatan'
			], true)
		]);
	}

	public function detilJabatan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$detilJabatan = $this->M_Jabatan->detil($id);
		$this->load->view('kajur/detiljabatan.php', [
			'detilJabatan' => $detilJabatan,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'jabatan'
			], true)
		]);
	}

	public function editJabatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->M_Jabatan->edit();
		redirect('kajur/detiljabatan/' . $_POST['id'], 'refresh');
	}

	public function insertJabatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Jabatan');
		$this->M_Jabatan->insert();
		redirect('kajur/jabatan', 'refresh');
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
		redirect('kajur/jabatan', 'refresh');
	}

	//end jabatan

	//kategori
	public function kategori()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$kategori = $this->M_Kategori->all();
		$this->load->view('kajur/kategori.php', [
			'kategori' => $kategori,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kategori'
			], true)
		]);
	}

	public function detilKategori($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$detilKategori = $this->M_Kategori->detil($id);
		$this->load->view('kajur/detilkategori.php', [
			'detilKategori' => $detilKategori,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kategori'
			], true)
		]);
	}

	public function editKategori()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$this->M_Kategori->edit();
		redirect('kajur/kategori', 'refresh');
	}

	public function insertKategori()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kategori');
		$this->M_Kategori->insert();
		redirect('kajur/kategori', 'refresh');
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
		redirect('kajur/kategori', 'refresh');
	}
	//end kategori

	//kegiatan

	public function kegiatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$kegiatan = $this->M_Kegiatan->all(1, 0)->result();
		$this->session->set_flashdata('undone', true);
		$this->load->view('kajur/kegiatan.php', [
			'kegiatan' => $kegiatan,
			'ses' => 0,
			'search' => 0,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function kegiatanTerlaksana()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$kegiatan = $this->M_Kegiatan->all(1, 1)->result();
		$this->session->set_flashdata('done', true);
		$this->load->view('kajur/kegiatan.php', [
			'kegiatan' => $kegiatan,
			'ses' => 1,
			'search' => 0,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function searchKegiatan($status)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		//var_dump($this->input->post('key'));
		$start = date('Y-m-d 00:00:00', strtotime($this->input->post('start')));
		$end = date('Y-m-d 00:00:00', strtotime($this->input->post('end')));
		$jenis = "";
		$mahasiswa = "";
		$biaya = "";
		if ($this->input->post('jns') != 5) {
			$jenis = $this->input->post('jns');
		}
		if ($this->input->post('mhs') != 5) {
			$mahasiswa = $this->input->post('mhs');
		}
		if ($this->input->post('biaya') != 5) {
			$biaya = $this->input->post('biaya');
		}

		$kegiatan = $this->M_Kegiatan->search($this->input->post('key'), $start, $end, $status, 1, $jenis, $mahasiswa, $biaya);
		$cnt = count($kegiatan);
		$this->load->view('kajur/kegiatan.php', [
			'kegiatan' => $kegiatan,
			'ses' => $status,
			'search' => 1,
			'cnt' => $cnt,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
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
		$this->load->model('M_Kategori');
		$this->load->model('M_KategoriKegiatan');
		if ($this->M_Kegiatan->detil($id)->row()->konfirmasi == 0) {
			redirect('kajur/detilpengajuan/' . $id, 'refresh');
		}
		$detilKegiatan = $this->M_Kegiatan->detil($id);
		$data['kegiatan'] = $this->M_Kegiatan->detil($id)->row();
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		$data['sidebar'] = $this->load->view('kajur/sidebar', [
			'nama_hal' => 'kegiatan'
		], true);
		$data['instansi'] = $this->M_Instansi->semua();
		$data['kategori'] = $this->M_Kategori->all();
		$data['dosen'] = $this->M_Dosen->all();
		$data['jabatan'] = $this->M_Jabatan->all();
		$data['penugasankegiatan'] = $this->M_Penugasan->penugasanToKegiatan($id);
		$data['kerjasama'] = $this->M_Kerjasama->see($id);
		$data['kategorikegiatan'] = $this->M_KategoriKegiatan->see($id);
		$data1 = $this->M_Kerjasama->see($id);
		foreach ($data1 as $result) {
			$value[] = (float) $result->idinstansi;
		}
		$data['dokumen'] = $this->M_Dokumen->view($id);
		$data['mahasiswa'] = $this->db->get('mahasiswa')->result();
		$data['penugasanmahasiswa'] = $this->db->get_where('penugasan_mhs', array('id_kegiatan' => $id))->result();
		$data['keterlibatan'] = $this->db->get_where('keterlibatan', array('id >' => '0'))->result();
		//echo json_encode($data['dokumen']);

		$this->load->view('kajur/detilkegiatan.php', $data);
	}

	public function jenisKerjasama($id)
	{
		$this->auth->doAuth();
		$data['colab'] = $this->db->get_where('kerjasama_acara', array('id' => $id))->row();
		$data['keterlibatan'] = $this->db->get_where('keterlibatan', array('id >' => '0'))->result();
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		if ($this->getdosen['role'] == 0) {
			$data['sidebar'] = $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kegiatan'
			], true);
		} else {
			$data['sidebar'] = $this->load->view('dosen/sidebar', [
				'nama_hal' => 'kegiatan'
			], true);
		}

		$this->load->view('kajur/detilcolab', $data);
	}

	public function masukinColab()
	{
		$this->auth->doAuth();
		$data = array(
			'id_keterlibatan' => $this->input->post('keterlibatan'),
			'keterangan'	=> $this->input->post('ket')
		);
		$id = $this->input->post('id');
		$idkegiatan = $this->input->post('idkegiatan');
		$this->db->update('kerjasama', $data, array('id' => $id));
		if ($this->getdosen['role'] == 0) {
			redirect('kajur/detilkegiatan/' . $idkegiatan, 'refresh');
		} else {
			redirect('dosen/detilkegiatan/' . $idkegiatan, 'refresh');
		}
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
			'jenis' => $this->input->post('jenis'),
			'instansilain' => $this->input->post('colab'),
			'melibatkanmahasiswa' => $this->input->post('mhs'),
			'sumberbiaya' => $this->input->post('sumberbiaya')
		);

		$data2 = array(
			'periode_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir')))
		);

		// $tglmulai = date('m/d/Y', strtotime($this->input->post('tanggal_mulai')));
		// $tglakhir = date('m/d/Y', strtotime($this->input->post('tanggal_akhir')));
		$tglmulai = $this->input->post('tanggal_mulai');
		$tglakhir = $this->input->post('tanggal_akhir');
		$reptglmulai = str_replace(" ", "/", $tglmulai);
		$reptglakhir = str_replace(" ", "/", $tglakhir);
		$formatmulai = array();
		$formatakhir = array();
		$formatmulai = (explode("/", $reptglmulai));
		$formatakhir = (explode("/", $reptglakhir));

		if ($formatmulai[0] == "Jan") {
			$formatmulai[0] = "01";
		} else if ($formatmulai[0] == "Feb") {
			$formatmulai[0] = "02";
		} else if ($formatmulai[0] == "Mar") {
			$formatmulai[0] = "03";
		} else if ($formatmulai[0] == "Apr") {
			$formatmulai[0] = "04";
		} else if ($formatmulai[0] == "May") {
			$formatmulai[0] = "05";
		} else if ($formatmulai[0] == "Jun") {
			$formatmulai[0] = "06";
		} else if ($formatmulai[0] == "Jul") {
			$formatmulai[0] = "07";
		} else if ($formatmulai[0] == "Aug") {
			$formatmulai[0] = "08";
		} else if ($formatmulai[0] == "Sep") {
			$formatmulai[0] = "09";
		} else if ($formatmulai[0] == "Oct") {
			$formatmulai[0] = "10";
		} else if ($formatmulai[0] == "Nov") {
			$formatmulai[0] = "11";
		} else if ($formatmulai[0] == "Dec") {
			$formatmulai[0] = "12";
		}

		if ($formatakhir[0] == "Jan") {
			$formatakhir[0] = "01";
		} else if ($formatakhir[0] == "Feb") {
			$formatakhir[0] = "02";
		} else if ($formatakhir[0] == "Mar") {
			$formatakhir[0] = "03";
		} else if ($formatakhir[0] == "Apr") {
			$formatakhir[0] = "04";
		} else if ($formatakhir[0] == "May") {
			$formatakhir[0] = "05";
		} else if ($formatakhir[0] == "Jun") {
			$formatakhir[0] = "06";
		} else if ($formatakhir[0] == "Jul") {
			$formatakhir[0] = "07";
		} else if ($formatakhir[0] == "Aug") {
			$formatakhir[0] = "08";
		} else if ($formatakhir[0] == "Sep") {
			$formatakhir[0] = "09";
		} else if ($formatakhir[0] == "Oct") {
			$formatakhir[0] = "10";
		} else if ($formatakhir[0] == "Nov") {
			$formatakhir[0] = "11";
		} else if ($formatakhir[0] == "Dec") {
			$formatakhir[0] = "12";
		}

		// echo $tglmulai;
		// echo $reptglmulai;
		// echo $formatmulai[0];
		// echo $formatakhir[0];

		if (strpos($reptglmulai, "/") && strpos($reptglakhir, "/")) {
			//echo 'ok';
			// $format = array();
			// $format = (explode("/", $tglmulai));
			$bulan = $formatmulai[0];
			$tanggal = $formatmulai[1];
			$tahun = $formatmulai[2];

			// $formatakhir = array();
			// $formatakhir = (explode("/", $tglakhir));
			$bulanakhir = $formatakhir[0];
			$tanggalakhir = $formatakhir[1];
			$tahunakhir = $formatakhir[2];

			if (checkdate($bulan, $tanggal, $tahun) && checkdate($bulanakhir, $tanggalakhir, $tahunakhir)) {
				if ($this->M_Kegiatan->edit($data, $id) == TRUE) {
					$this->M_Kegiatan->editTanggalAkhir($data2, $id);
					$this->M_Kegiatan->editTanggalAkhir2($data2, $id);
					$this->session->set_flashdata('edit', true);
				} else {
					$this->session->set_flashdata('edit', false);
				}
				redirect('kajur/detilkegiatan/' . $id, 'refresh');
			} else {
				echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
				echo anchor('kajur/detilkegiatan/' . $id, 'Kembali');
			}
		} else {
			echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
			echo anchor('kajur/detilkegiatan/' . $id, 'Kembali');
		}
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
		redirect('kajur/kegiatan/undone', 'refresh');
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
			'konfirmasi' => '1',
			'jenis' => $this->input->post('jenis'),
			'instansilain' => $this->input->post('colab'),
			'melibatkanmahasiswa' => $this->input->post('mhs'),
			'sumberbiaya' => $this->input->post('sumberbiaya'),
			'pengaju' => $this->getdosen['id']
		);
		$tglmulai = $this->input->post('tanggal_mulai');
		$tglakhir = $this->input->post('tanggal_akhir');

		if (strpos($tglmulai, "/") && strpos($tglakhir, "/")) {
			$format = array();
			$format = (explode("/", $tglmulai));
			$bulan = $format[0];
			$tanggal = $format[1];
			$tahun = $format[2];

			$formatakhir = array();
			$formatakhir = (explode("/", $tglakhir));
			$bulanakhir = $formatakhir[0];
			$tanggalakhir = $formatakhir[1];
			$tahunakhir = $formatakhir[2];
			// print_r($tahun);
			// var_dump(checkdate( $bulan, $tanggal, $tahun ));
			//echo checkdate( $bulan, $tanggal, $tahun );
			if (checkdate($bulan, $tanggal, $tahun) && checkdate($bulanakhir, $tanggalakhir, $tahunakhir)) {
				if ($this->M_Kegiatan->insert($data) == TRUE) {
					$this->session->set_flashdata('tambah', true);
				} else {
					$this->session->set_flashdata('tambah', false);
				}
				redirect('kajur/kegiatan/undone', 'refresh');
			} else {
				echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
				echo anchor('kajur/kegiatan/undone', 'Kembali');
			}
		} else {
			echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
			echo anchor('kajur/kegiatan/undone', 'Kembali');
		}
	}

	public function pengajuan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$kegiatan = $this->M_Kegiatan->all(0, 0)->result();
		$where2 = array(

			'konfirmasi' => 2
		);
		$this->db->order_by('konfirmasi', 'asc');
		$ditolak = $this->db->get_where('kegiatan', $where2)->result();
		$this->load->view('kajur/pengajuan.php', [
			'kegiatan' => $kegiatan,
			'ditolak' => $ditolak,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function detilPengajuan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$this->load->model('M_Dokumen');
		$detilKegiatan = $this->M_Kegiatan->detil($id);
		$data['kegiatan'] = $this->M_Kegiatan->detilPengajuan($id);
		$data['dokumen'] = $this->M_Dokumen->view($id);
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		$data['sidebar'] = $this->load->view('kajur/sidebar', [
			'nama_hal' => 'kegiatan'
		], true);
		$this->load->view('kajur/detilpengajuan.php', $data);
	}

	public function acc($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'konfirmasi' => $this->input->post('konfirmasi')
		);
		if ($this->M_Kegiatan->acc($data, $id) == TRUE) {
			$this->session->set_flashdata('edit', true);
		} else {
			$this->session->set_flashdata('edit', false);
		}

		$email = $this->M_Dosen->detil($this->input->post('iddosen'));
		// print_r($email['email']);

		// $from_email = "tobiasjaya3@gmail.com";
		// $to_email = "tobiasjaya3@gmail.com";
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
		$this->email->subject('Status Konfirmasi Kegiatan ' . $namakegiatan);
		$konfirmasi = "";
		if ($this->input->post('konfirmasi') == 1) {
			$konfirmasi = "diterima";
		} else {
			$konfirmasi = "ditolak";
		}
		$this->email->message('Pengajuan kegiatan anda, "' . $namakegiatan . '" telah ' . $konfirmasi . '. Pergi ke halaman http://localhost/skripsi/dosen/detilkegiatan/' . $idkegiatan . ' untuk melihat detailnya.');
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

		redirect('kajur/kegiatan/undone', 'refresh');
	}

	public function selesai($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kegiatan');
		$selesai = $this->db->get_where('kegiatan', array('id' => $id))->row();
		//var_dump(json_encode($selesai->tanggal_akhir));
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');

		if ($now >= $selesai->tanggal_akhir) {

			if ($this->M_Kegiatan->selesai($id) == TRUE) {
				$this->session->set_flashdata('selesai', true);
				redirect('kajur/kegiatan/terlaksana', 'refresh');
			} else {
				echo $this->session->set_flashdata('selesai', false);
			}
		} else {
			echo 'KEGIATAN INI BELUM SELESAI !! </br>';
			echo anchor('kajur/detilkegiatan/' . $id, 'Kembali');
			//redirect('kajur/detilkegiatan/' . $id, 'refresh');
		}
	}

	//end kegiatan

	//instansi
	public function instansiDalam()
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$instansiDalam = $this->M_Instansi->all(0);
		$cnt = array();
		foreach ($instansiDalam as $id) {
			array_push($cnt, count($this->db->get_where('kerjasama_acara', array('idinstansi' => $id->id))->result()));
		}
		//var_dump($cnt);
		$this->load->view('kajur/instansi.php', [
			'instansi' => $instansiDalam,
			'cnt' => $cnt,
			'ses' => 0,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function instansiLuar()
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$instansiDalam = $this->M_Instansi->all(1);
		$cnt = array();
		foreach ($instansiDalam as $id) {
			array_push($cnt, count($this->db->get_where('kerjasama_acara', array('idinstansi' => $id->id))->result()));
		}
		$this->load->view('kajur/instansi.php', [
			'instansi' => $instansiDalam,
			'cnt' => $cnt,
			'ses' => 1,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function detilInstansi($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$detilInstansi = $this->M_Instansi->detil($id);
		$riwayat = $this->db->get_where('kerjasama_acara', array('idinstansi' => $id))->result();
		$this->db->order_by('status', 'asc');
		$cnt = count($riwayat);
		$this->load->view('kajur/detilinstansi.php', [
			'detilInstansi' => $detilInstansi,
			'riwayat' => $riwayat,
			'cnt' => $cnt,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'instansi'
			], true)
		]);
	}

	public function editInstansi($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$this->M_Instansi->edit();
		redirect('kajur/detilinstansi/' . $id, 'refresh');
	}

	public function insertInstansi()
	{
		$this->auth->doAuth();
		$this->load->model('M_Instansi');
		$this->M_Instansi->insert();
		redirect('kajur/instansiluar', 'refresh');
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
		redirect('kajur/instansiluar', 'refresh');
	}

	//end instansi

	//kerjasama

	public function insertKerjasama()
	{
		$this->auth->doAuth();
		$this->load->model('M_Kerjasama');
		$id_kegiatan = $this->input->post('id', TRUE);
		$id_instansi = $this->input->post('instansi', TRUE);
		$this->M_Kerjasama->insert($id_kegiatan, $id_instansi);
		redirect('kajur/detilkegiatan/' . $id_kegiatan, 'refresh');
	}

	public function deleteKerjasama($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Kerjasama');
		$idkegiatan = $this->M_Kerjasama->getById($id);
		//var_dump(json_encode($idkegiatan->id_kegiatan));
		$this->M_Kerjasama->delete($id);
		if ($this->getdosen['role'] == 0) {
			redirect('kajur/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
		} else {
			redirect('dosen/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
		}
	}

	//end kerjasama

	//kategori kegiatan

	public function insertKategoriKegiatan()
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$id_kegiatan = $this->input->post('id', TRUE);
		$id_kategori = $this->input->post('kategori', TRUE);
		$this->M_KategoriKegiatan->insert($id_kegiatan, $id_kategori);
		redirect('kajur/detilkegiatan/' . $id_kegiatan, 'refresh');
	}

	public function deleteKategoriKegiatan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$idkegiatan = $this->M_KategoriKegiatan->getById($id);
		//var_dump(json_encode($idkegiatan->id_kegiatan));
		$this->M_KategoriKegiatan->delete($id);
		redirect('kajur/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
	}

	//end kategori kegiatan

	//upload

	public function uploadDokumen($id_kegiatan)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');
		$data = array();
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

		//var_dump($nama);

		if ($this->input->post('submitupload')) {
			// Jika user menekan tombol Submit (Simpan) pada form
			// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			$upload = $this->M_Dokumen->upload($nama);
			//var_dump($upload);

			if ($upload['result'] == "success") {
				// Jika proses upload sukses
				// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				$this->M_Dokumen->save($upload, $id_kegiatan);

				redirect('kajur/detilkegiatan/' . $id_kegiatan, 'refresh'); // Redirect kembali ke halaman awal / halaman view data
			} else {
				// Jika proses upload gagal

				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				echo $data['message'];
				echo anchor('kajur/detilkegiatan/' . $id_kegiatan, 'Kembali');
			}
		}
	}

	public function detilDokumen($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');
		$dokumen = $this->M_Dokumen->detil($id);
		$this->load->view('kajur/detildokumen.php', [
			'dokumen' => $dokumen,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function deleteDokumen($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Dokumen');
		$kegiatan = $this->M_Dokumen->detil($id);
		$this->M_Dokumen->hapusDokumen($id);

		redirect('kajur/detilkegiatan/' . $kegiatan['kegiatan'], 'refresh');
	}

	//end upload

	//penugasan

	public function insertPenugasan()
	{
		$this->auth->doAuth();
		$this->load->model('M_Penugasan');
		$this->load->model('M_Kegiatan');
		$this->load->model('M_Dosen');
		$data = array(
			'id_kegiatan' => $this->input->post('id'),
			'periode_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('periode_akhir'))),
			'id_dosen' => $this->input->post('dosen'),
			'id_jabatan' => $this->input->post('jabatan')
		);

		//var_dump(json_encode($data));

		$periodeakhir = $this->input->post('periode_akhir');
		$repperiodeakhir = str_replace(" ", "/", $periodeakhir);
		$formatperiode = array();
		$formatperiode = (explode("/", $repperiodeakhir));

		if ($formatperiode[0] == "Jan") {
			$formatperiode[0] = "01";
		} else if ($formatperiode[0] == "Feb") {
			$formatperiode[0] = "02";
		} else if ($formatperiode[0] == "Mar") {
			$formatperiode[0] = "03";
		} else if ($formatperiode[0] == "Apr") {
			$formatperiode[0] = "04";
		} else if ($formatperiode[0] == "May") {
			$formatperiode[0] = "05";
		} else if ($formatperiode[0] == "Jun") {
			$formatperiode[0] = "06";
		} else if ($formatperiode[0] == "Jul") {
			$formatperiode[0] = "07";
		} else if ($formatperiode[0] == "Aug") {
			$formatperiode[0] = "08";
		} else if ($formatperiode[0] == "Sep") {
			$formatperiode[0] = "09";
		} else if ($formatperiode[0] == "Oct") {
			$formatperiode[0] = "10";
		} else if ($formatperiode[0] == "Nov") {
			$formatperiode[0] = "11";
		} else if ($formatperiode[0] == "Dec") {
			$formatperiode[0] = "12";
		}

		if (strpos($repperiodeakhir, "/")) {
			//echo 'ok';
			// $format = array();
			// $format = (explode("/", $tglmulai));
			$bulan = $formatperiode[0];
			$tanggal = $formatperiode[1];
			$tahun = $formatperiode[2];

			if (checkdate($bulan, $tanggal, $tahun)) {
				if ($this->M_Penugasan->insert($data) == TRUE) {
					$this->session->set_flashdata('tambah', true);
				} else {
					$this->session->set_flashdata('tambah', false);
				}

				$email = $this->M_Dosen->detil($this->input->post('dosen'));
				// print_r($email['email']);

				// $from_email = "tobiasjaya3@gmail.com";
				// $to_email = "tobiasjaya3@gmail.com";
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

				redirect('kajur/detilkegiatan/' . $this->input->post('id'), 'refresh');
			} else {
				echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
				echo anchor('kajur/detilkegiatan/' . $this->input->post('id'), 'Kembali');
			}
		} else {
			echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
			echo anchor('kajur/detilkegiatan/' . $this->input->post('id'), 'Kembali');
		}
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

		$periodeakhir = $this->input->post('periode_akhir');
		$repperiodeakhir = str_replace(" ", "/", $periodeakhir);
		$formatperiode = array();
		$formatperiode = (explode("/", $repperiodeakhir));

		if ($formatperiode[0] == "Jan") {
			$formatperiode[0] = "01";
		} else if ($formatperiode[0] == "Feb") {
			$formatperiode[0] = "02";
		} else if ($formatperiode[0] == "Mar") {
			$formatperiode[0] = "03";
		} else if ($formatperiode[0] == "Apr") {
			$formatperiode[0] = "04";
		} else if ($formatperiode[0] == "May") {
			$formatperiode[0] = "05";
		} else if ($formatperiode[0] == "Jun") {
			$formatperiode[0] = "06";
		} else if ($formatperiode[0] == "Jul") {
			$formatperiode[0] = "07";
		} else if ($formatperiode[0] == "Aug") {
			$formatperiode[0] = "08";
		} else if ($formatperiode[0] == "Sep") {
			$formatperiode[0] = "09";
		} else if ($formatperiode[0] == "Oct") {
			$formatperiode[0] = "10";
		} else if ($formatperiode[0] == "Nov") {
			$formatperiode[0] = "11";
		} else if ($formatperiode[0] == "Dec") {
			$formatperiode[0] = "12";
		}

		if (strpos($repperiodeakhir, "/")) {
			//echo 'ok';
			// $format = array();
			// $format = (explode("/", $tglmulai));
			$bulan = $formatperiode[0];
			$tanggal = $formatperiode[1];
			$tahun = $formatperiode[2];

			if (checkdate($bulan, $tanggal, $tahun)) {
				if ($this->M_Penugasan->insertMhs($data) == TRUE) {
					$this->session->set_flashdata('tambah', true);
				} else {
					$this->session->set_flashdata('tambah', false);
				}
				redirect('kajur/detilkegiatan/' . $this->input->post('id'), 'refresh');
			} else {
				echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
				echo anchor('kajur/detilkegiatan/' . $this->input->post('id'), 'Kembali');
			}
		} else {
			echo "<h3>Tanggal yang anda masukkan tidak valid. Format : bulan/tanggal/tahun</h3>";
			echo anchor('kajur/detilkegiatan/' . $this->input->post('id'), 'Kembali');
		}
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
		$this->load->view('kajur/detilpenugasan.php', [
			'penugasan' => $penugasan,
			'jabatan' => $jabatan,
			'dosen' => $dosen,
			'topbar' => $this->load->view('kajur/topbar', [], true),
			'sidebar' => $this->load->view('kajur/sidebar', [
				'nama_hal' => 'kegiatan'
			], true)
		]);
	}

	public function editPenugasan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_Penugasan');
		$data = array(
			// 'nama' => $this->input->post('nama'),
			// 'deskripsi' => $this->input->post('deskripsi'),
			// 'tempat' => $this->input->post('tempat'),
			// 'tanggal_mulai' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_mulai'))),
			// 'tanggal_akhir' => date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_akhir'))),
			// 'jenis' => $this->input->post('jenis')
			//'id_dosen' => $this->input->post('dosen'),
			'id_jabatan' => $this->input->post('jabatan')
		);

		if ($this->M_Penugasan->edit($data, $id) == TRUE) {
			$this->session->set_flashdata('edit', true);
		} else {
			$this->session->set_flashdata('edit', false);
		}
		redirect('penugasan/detil/' . $id, 'refresh');
	}

	public function deletePenugasan($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$idkegiatan = $this->db->get_where('penugasan', array('id' => $id))->row();
		$this->db->delete('penugasan', array('id' => $id));
		redirect('kajur/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
	}

	public function deletePenugasanMhs($id)
	{
		$this->auth->doAuth();
		$this->load->model('M_KategoriKegiatan');
		$idkegiatan = $this->db->get_where('penugasan_mahasiswa', array('id' => $id))->row();
		$this->db->delete('penugasan_mahasiswa', array('id' => $id));
		redirect('kajur/detilkegiatan/' . $idkegiatan->id_kegiatan, 'refresh');
	}

	//kolaborasi

	public function kolaborasi()
	{
		$this->auth->doAuth();
		$kolaborasi = $this->db->get_where('keterlibatan', array('id >' => '0'))->result();
		$data['kolaborasi'] = $kolaborasi;
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		$data['sidebar'] = $this->load->view('kajur/sidebar', [
			'nama_hal' => 'kolaborasi'
		], true);
		$this->load->view('kajur/keterlibatan.php', $data);
	}

	public function deleteKolaborasi($id)
	{
		$this->auth->doAuth();
		$this->db->delete('keterlibatan', array('id' => $id));
		redirect('kajur/kolaborasi', 'refresh');
	}

	public function insertKolaborasi()
	{
		$this->auth->doAuth();
		$data = array(
			'nama' => $this->input->post('nama')
		);
		$this->db->insert('keterlibatan', $data);
		redirect('kajur/kolaborasi', 'refresh');
	}

	public function detilKolaborasi($id)
	{
		$this->auth->doAuth();
		$colab = $this->db->get_where('keterlibatan', array('id' => $id))->row();
		$data['colab'] = $colab;
		$data['topbar'] = $this->load->view('kajur/topbar', [], true);
		$data['sidebar'] = $this->load->view('kajur/sidebar', [
			'nama_hal' => 'kolaborasi'
		], true);
		$this->load->view('kajur/detilketerlibatan.php', $data);
	}

	public function editKolaborasi()
	{
		$this->auth->doAuth();
		$id = $this->input->post('id');
		$data = array(
			'nama' => $this->input->post('nama')
		);
		$this->db->update('keterlibatan', $data, array('id' => $id));
		redirect('kajur/detilkolaborasi/' . $id, 'refresh');
	}

	//end kolaborasi

}
