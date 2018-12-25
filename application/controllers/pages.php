<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function view($page = 'login')
	{
		if(!file_exists(APPPATH . 'views/' . $page . '.php')){
			show_404();
		}		
		
		$data['title'] = ucfirst($page);

		if($page == 'setting'){
			$this->load->library('session');
			$this->load->model('model_users');
			$userId = $this->session->userdata('id');
			$data['userdata'] = $this->model_users->fetchUser('$userId');
		}

		if($page == 'login'){
			$this->loggedIn();
			$this->load->view($page, $data);
		}
		else {
			$this->notLoggedIn();
			$this->load->view('template/header', $data);
			$this->load->view($page, $data);
			$this->load->view('template/footer', $data);
		}
		
		
	}
}
