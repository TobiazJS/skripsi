<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Login extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 

		$this->load->model('M_Dosen');    

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    
	}

	//LOGIN

	public function login()
	{
		$this->load->library('session');
		$method = $this->input->method();
		if($method == 'post'){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$data = $this->M_Dosen->isExist($email,$password);
			if(count($data) === 1){
				$this->session->set_userdata([
					'email' => $email
				]);


				echo 'ini username '.$email.'<br>';
				//print_r($data);
				
				if ($data[0]->role == 0) {	
					redirect('/kajur/kegiatan/undone');
					
				}else if ($data[0]->role == 1) {

					redirect('/dosen/kegiatan');

				 }//else if ($data[0]->status == 3) {

				// 	redirect('/cs/pesanmasuk');

				// }else if($data[0]->status == 4) {

				// 	redirect('/admin/pegawai');					
				// }

				 }else{
				 	echo "Akun Tidak Ditemukan";
				 	redirect('/');
				 }
				}else{
					$this->load->view('login');
				}
			}


	//LOGOUT

			public function logout(){
				$newdata = array(
					'username'  =>'',
					'password' => '',
					'logged_in' => FALSE,
				);

				$this->session->unset_userdata('username');
				$this->session->sess_destroy();

				redirect(base_url(),'refresh');

			}
		}
