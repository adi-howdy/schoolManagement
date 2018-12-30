<?php 

    class model_teacher extends CI_Model{

        public function _construct(){
            parent::__construct();
        }

        public function create($url){
         if( $this->input->post('image') == null) {
             $image_path = "not there";
         }
            $data = array(
                'register_date' => $this->input->post('register'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'date_of_birth'  => $this->input->post('dob'),
                'age' => $this->input->post('age'),
                'contact' => $this->input->post('contact'),
                'job_type' => $this->input->post('jobType'),
                'email' => $this->input->post('email'),
                'image' => $url
            );

           $data_entry = $this->db->insert('teacher',$data);

           return($data_entry == true ? true : false);
        }

        public function fetchTeacher(){
            /*
            if($teacherId){
                $sql = "Select * from teacher where teacher_id = ?";
                $query = $this->db->query($sql, array($teacherId));
                $result = $query->row_array();
                return($result);
            }
            else{
                */
                /*
                $sql = "Select * from teacher";
                $query = $this->db->query($sql);
                $result = $query->row_array();
                print_r('all values ' . $result);
                return($result);
                */
           // }

           return $this->db->get("teacher");
        }

        public function fetchTeacherwithID($teacherId){
            
            if($teacherId){
                $sql = "Select * from teacher where teacher_id = ?";
                $query = $this->db->query($sql, array($teacherId));
                $result = $query->row_array();
                return($result);
          //  return    $this->db->get_where('teacher', array('teacher_id' => $teacherId));
            }
           
           //return $this->db->get("teacher");
        }


        public function remove($teacherId){
            return $this->db->delete('teacher', array('teacher_id'=>$teacherId));
        }


        public function updateTeacher($teacherId)
        {
/*
            if( $this->input->post('image') == null) {
                $image_path = "not there";
            }
  */
            //echo 'teacher id from update ' +  $teacherId;
            $data = array(
                'register_date' => $this->input->post('editregister'),
                'fname' => $this->input->post('editfname'),
                'lname' => $this->input->post('editlname'),
                'date_of_birth'  => $this->input->post('editdob'),
                'age' => $this->input->post('editage'),
                'contact' => $this->input->post('editcontact'),
                'job_type' => $this->input->post('editjobType'),
                'email' => $this->input->post('editemail'),
                'image' => $this->input->post('editimageupload')
            );
            $this->db->where('teacher_id', $teacherId);
            $update = $this->db->update('teacher', $data);
            return($update == true ? true: false);
            
        }
    }
?>