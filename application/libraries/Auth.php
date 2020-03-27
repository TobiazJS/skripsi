<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth{
	
	function doAuth(){
		$CI =& get_instance();
		if(!$CI->session->userdata('email')){
			redirect('/','refresh');
			die();
		}
	}

	
}