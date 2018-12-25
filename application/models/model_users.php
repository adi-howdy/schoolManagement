<?php

class Model_Users extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function validate_username($name){
        if($name){
            $sql = "select * from users where username = ?";
            $query = $this->db->query($sql, array($name));
            $result = $query->row_array();
            return ($query->num_rows()===1) ? true: false;
        }
        else {
            return false;
        }

    }

    public function login($name, $password){
        if($name && $password){
            $sql = "select * from users where username = ? and password = ?";
            $query = $this->db->query($sql, array($name, $password));
            $result = $query->row_array();
            return($query->num_rows() === 1) ? $result['user_id'] : false;
        }
        else {
            return false;
        }
    }

    public function fetchUser($id){
        if($id){
            $sql = "select * from users where user_id = ?";
            $query = $this->db->query($sql, array($id));
            return($query->row_array());
        }
    }

    public function updateProfile($id){
        echo ('id is from update profile ' . $id);
        if($id){
           $update_data = array(
               'username' => $this->input->post('userName'),
               'fname' => $this->input->post('fname'),
               'lname' => $this->input->post('lname'),
               'email' => $this->input->post('email')
           );

        $this->db->where('user_id',$id);
        $this->db->update('users',$update_data);

        return true;
        }
        else {
            return false;
        }
    }

    public function current_password($id, $password){
        if($id && $password){
            $sql = "select * from users where user_id = ? and password = ?";
            $query = $this->db->query($sql, array($id, $password));
            if($query->num_rows() == 1){
                return true;
            }
            else {
                return false;
            }

        }
    }

    public function updatePassword($id){
       if($id){
           $passwordMd5 = md5($this->input->post('npass'));
        $data = array(
           'password' =>  $passwordMd5
       );
       $this->db->where('user_id',$id);
       $status = $this->db->update('users',$data);
       
       return($status == true ? true : false );
    }
    }
}
?>