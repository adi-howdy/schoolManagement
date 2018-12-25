<?php 
    //defined('BASEPATH') OR exit('No direct script access allowed');

    class Users extends MY_Controller {

        public function __construct()
        {
            parent::__construct();

            //models

            $this->load->model('model_users');
            //validation
          
            $this->load->library('form_validation');
        


        }

        public function login(){

            $validator = array('success' => false, 'messages' => array());

            $validate_array = array(
                array(
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'required|callback_validate_username' 

                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                ));

                $this->form_validation->set_rules($validate_array);
                
                //$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
                
                if($this->form_validation->run() == true){
                    
                    $username = $this->input->post('name');
                    $password = $this->input->post('password');

                    $login = $this->model_users->login($username, $password);

                    if($login) {

                        $this->load->library('session');
                        //$login becoz it is associative array and has username and password.
                        $user_data = array(
                            "id" => $login,
                            "logged_in" => true
                        );

                        $this->session->set_userdata($user_data);

                        
                        $validator["success"] = true;
                        $validator["messages"] = "dashboard";
                    }
                    else{
                        $validator["success"] = false;
                        $validator["messages"] = "Incorrect username and passowrd";
                    }
            }
                else{
                    $validator["success"] = false;
                    foreach($_POST as $key => $value){
                        $validator['messages'][$key] = form_error($key);
                    }
                }

                echo json_encode($validator);
        }

        public function validate_username(){
            $validate = $this->model_users->validate_username($this->input->post('name'));
            if($validate==true){
                return true;
            }
            else {
                $this->form_validation->set_message('validate_username', 'This {field} do not exists');
                return false;
            }
        }

        public function logOut(){
            $this->load->library('session');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        }

        public function updateProfile(){
            $this->load->library('session');
            $userId = $this->session->userdata('id');
            $userName = $this->session->userdata('fname');

            echo 'id is ' . $userId;
            echo 'name is ' . $userName;
  
            $validate = array('success'=> false, 'message'=> array());
         /*

         Need to check validation it dont work.
            $validate_data = array(
                array(
                    'field' => 'userName',
                    'label' => 'User Name',
                    'rule' => 'required'
                ),
                array(
                    'field' => 'fname',
                    'label' => 'First Name',
                    'rule' => 'required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rule' => 'required'
                )
                );


            $this->form_validation->set_rules($validate_data);
            //$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            //$this->form_validation->set_rules('userName', 'User Name', 'required');
            echo 'form validation123 ' . $this->form_validation->run();

            
            if($this->form_validation->run()=== true){
           */     
                if($userId){
                $update =   $this->model_users->updateProfile($userId);
            
                echo 'update staus ' . $update;
            if($update == true){
                $validate["success"] = true;
                $validate["message"] = 'Successfully updated the profile';
            }
            else {
                $validate["success"] = false;
                $validate["message"] = 'Error updating profile in db';
            }
        }
        else {
            echo "fuck off";
        }
            echo json_encode($validate);
        }


        public function changePassword(){
            $this->load->library('session');
           $userId = $this->session->userdata('id');

            $validate = array('success' => false, 'message' => array());

            $validate_data = array(
                    array(
                        'field' => 'cpass',
                        'label' => 'Current Password',
                        'rules' => 'required|callback_current_password' 
                    ),
                    array(
                        'field' => 'npass',
                        'label' => 'New Password',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'cnpass',
                        'label' => 'Confirm New Password',
                        'rules' => 'required|matches[npass]'
                    )
            );

            $this->form_validation->set_rules($validate_data);

            if($this->form_validation->run() == true){
                $updatePassword = $this->model_users->updatePassword($userId);

                if($updatePassword){
                    $validate['success'] = true;
                    $validate['message'] = 'Password updated';
                }
                else {
                    $validate['success'] = false;
                    $validate['message'] = 'Password updated unsuccessful';
                }
            }
            else {
                $validate['success'] = false;
                $validate['message'] = 'Password updated unsuccessful';
            }
        }


        public function current_password(){
            $userId = $this->session->userdata('id');
            $validate = $this->model_users->current_password($userId, $this->input->post('cpass'));

            if($validate){
                return true;
            }
            else{
                return false;
            }
        }

    }

?>