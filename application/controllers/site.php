<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	function __construct(){
	            parent::__construct();
		$this->is_logged_in();
	}

	function members_area(){
		$data["main_content"] = "members_area";
		$this->load->view("includes/template" ,$data);
	}

	function is_logged_in(){
		$is_logged_in = $this->session->userdata("is_logged_in");

		if(!isset($is_logged_in) || $is_logged_in != true){
			echo "you don't have cookey";
			die();
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->load->view("login_form");
	}
}