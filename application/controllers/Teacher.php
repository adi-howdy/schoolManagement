<?php 
    //defined('BASEPATH') OR exit('No direct script access allowed');

    class Teacher extends MY_Controller{

        public function  _construct(){
            parent::_construct();
            $this->load->library('form_validation');
            $this->load->model('model_teacher');
            
        }


        public function createTeacher(){
            $this->load->model('model_teacher');
            $array_data = array('success' => false, 'message' => array());

            $validate_data = array(
                                array(
                                    'field' => 'fname',
                                    'label' => 'First Name',
                                    'rules' => 'required'
                                ),
                                array(
                                    'field' => 'lname',
                                    'label' => 'Last Name',
                                    'rules' => 'required'
                                ),
                                array(
                                    'field' => 'dob',
                                    'label' => 'DOB',
                                    'rules' => 'required'
                                ),
                                array(
                                    'field' => 'age',
                                    'label' => 'Age',
                                    'rules' => 'required'
                                ),
                                array(
                                    'field' => 'email',
                                    'label' => 'Email',
                                    'rules' => 'required'
                                ));
            
            $this->form_validation->set_rules($validate_data);

            if($this->form_validation->run() == true){
              $url = $this->upload_image();

               $inserted = $this->model_teacher->create($url);

               if($inserted){
                  $array_data['success'] =  true;
                  $array_data['message'] = 'Data successfully inserted';
                  //echo "<script> location.href='../'; </script>";
                }
               else{
                $array_data['success'] =  false;
                $array_data['message'] = 'Error inserting';
               }
            }
            echo json_encode($array_data);
        }


        //Upload image

        public function upload_image(){
            $type = explode('.', $_FILES['imageUpload']['name']);
            $type = $type[count($type)-1];
            $url = 'assets/images/teachers/'.uniqid(rand()).'.'.$type;
            if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))){
                if(is_uploaded_file($_FILES['imageUpload']['tmp_name'])){
                    if(move_uploaded_file($_FILES['imageUpload']['tmp_name'],$url)){
                        return $url;
                    }
                    else {
                        return false;
                    }
                }
            }
        }

        public function fetchTeacher($teacherId = null){
            $this->load->model('model_teacher');
                $draw = intval($this->input->get("draw"));
                $start = intval($this->input->get("start"));
                $length = intval($this->input->get("length"));

                if($teacherId){
                   $output =  $this->model_teacher->fetchTeacherwithID($teacherId);
                  //echo("<script>console.log('PHP: ".$output."');</script>");
                echo json_encode($output);
                }
                    else{
                $teacher1 = $this->model_teacher->fetchTeacher();
                $data = array();



                foreach($teacher1->result() as $r){
                    //echo 'Photo location ' . $r->image;
                    //echo 'teacher id == ' + $r->teacher_id;
                    $botton = ' 
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Action
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateTeacherModal" 
                        onclick="updateTeacher('.$r->teacher_id.')">Edit</button>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#removeTeacher"
                       onclick="removeTeacher('.$r->teacher_id.')">Remove</button>
                    </div>
                  </div> ';

                  $photo = "<img src='$r->image' alt='photo' class='img-circle candidate_photo'/>";
                  
                $data[] = array(
                        $photo,
                        $r->fname . ' ' . $r->lname,
                       $r->age,
                       $r->contact,
                       $r->email,
                       $botton);
                }

                $output =  array(
                    "draw" => $draw,
                 "recordsTotal" => $teacher1->num_rows(),
                 "recordsFiltered" => $teacher1->num_rows(),
                    "data" => $data
                );
             //added here   
             echo json_encode($output);
            }
           


            }
           // echo json_encode($result);
        

           public function updateTeacher($teacherId){
               $this->load->model('model_teacher');
               //echo 'teacher id is :' + $teacherId;
               $validator = array('success'=>true, 'message'=>array());

               //if($this->form_validation->run() == true){
               // $url = $this->upload_image();

               $updated = $this->model_teacher->updateTeacher($teacherId);
            if($updated){
                $validator['success']= true;
                $validator['message'] = 'Successfully updated';
            }
            else{
                $validator['success']= true;
                $validator['message'] = 'Update failed';
            }

           }

           //Remove teacher 
           public function remove($teacherId){
            $this->load->model('model_teacher');
               $validator =  array('success' => true, 'message' => array());

               $removed = $this->model_teacher->remove($teacherId);

               if($removed){
                    $validator['success'] = true;
                    $validator['message'] = 'Successfully removed';
               }
               else {
                $validator['success'] = false;
                $validator['message'] = 'Could not remove';
               }
               echo json_encode($validator);

           }
    }


?>