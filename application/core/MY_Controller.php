<?php

Class MY_Controller extends CI_Controller {

    public function _construct(){
        parent::_construct();
    }

    //redirect to dashboard page if logged in 
    public function loggedIn(){
        $this->load->library('session');
        if($this->session->userdata('logged_in') === true){
            redirect('dashboard', 'refresh');
        }
    }

    //redirect to login page if not logged in
    public function notLoggedIn(){
        $this->load->library('session');
        if($this->session->userdata('logged_in') != true){
            redirect('login', 'refresh');
        }
    }
}

?>