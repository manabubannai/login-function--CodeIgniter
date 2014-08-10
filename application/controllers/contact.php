<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	function index(){
		// echo "contact from here";
		$data["main_content"] = "contact_form";
		$this->load->view("includes/template" ,$data);
	}

	function submit(){
		$name = $this->input->post("name");

		// ajaxでポストしたデータをis_ajaxで受け取る
		$is_ajax = $this->input->post("ajax");

		// main_contentのテンプレートにはcontact_submittedのデータを格納
		$data["main_content"] = "contact_submitted";

		// AJAXが成功するかどうかで条件分岐
		if($is_ajax){
			// AJAXが正常にロードされたらmain_contentのみを読み込む
			$this->load->view($data["main_content"]);
		}else{
			// AJAXが正常にロードされなかったら、現在のページにとどまる
			$this->load->view("includes/template" ,$data);
		};

	}
}