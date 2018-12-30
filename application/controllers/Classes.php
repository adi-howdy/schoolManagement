<?php 

    class Classes extends MY_Controller{

        function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('model_classes');
        }

    public function addClass(){
        $this->load->model('model_classes');
        $data = array('success' => true, 'message' => array());
        $config = array(
            array(
                'field' => 'className',
                'label' => 'Class Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'classNumName',
                'label' => 'Class Num Name',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == true){
        $inserted = $this->model_classes->addClass();
            
        if($inserted){
            $data['success'] = true;
            $data['message'] = 'Class is successfully inserted';
        }
        else{
            $data['success'] = false;
            $data['message'] = 'Class could not be inserted';
        }
    }
    else {
        echo 'validation failed';
        $data['success'] = false;
        $data['message'] = 'Class could not be inserted';
    }
    echo json_encode($data);
    }


    public function fetchClass(){
        $this->load->model('model_classes');

      $classes =  $this->model_classes->fetchClass();

      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $data = array();
      foreach($classes -> result() as $r){

        $button = '<div class="classDropdown">
     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Action
     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       <a class="dropdown-item" href="#" id="removeClass" onclick="removeClass('.$r->class_id.')">Remove</a>
       <a class="dropdown-item" href="#" id="editClass">Edit</a>
     </div>
   </div>';

        $data[] = array(
            $r-> class_name,
            $r-> numeric_name,
            $button
        );
      }

      $output = array(
        "draw" => $draw,
          "recordsTotal" => $classes->num_rows(),
          "recordsFiltered" => $classes->num_rows(),
          "data" => $data
     );
     echo json_encode($output);
    }


    public function removeClass($classId){
       $data = array('success' => false, 'messages' => array());
       
        if($classId){
          $deleted =  $this->model_classes->removeClass($classId);
        
          if($deleted){
              $data['success'] = true;
              $data['messages'] = 'Successfully Deleted';
          }
          else{
              $data['success'] = false;
              $data['messages'] = 'Could not delete';
          }  
        }
        echo json_encode($data);


    }
    }
?>