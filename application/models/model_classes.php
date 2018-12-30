<?php 

    Class Model_classes extends CI_Model{

        function __construct()
        {
            parent::__construct();
        }

        public function addClass(){
            $data = array(
                'class_name' => $this->input->post('className'),
                'numeric_name' => $this->input->post('classNumName')
            );
            
            return $this->db->insert('class', $data);
            
        }

        public function fetchClass(){
            return $this->db->get('class');
        }

        public function removeClass($classId){
            return $this->db->delete('class', array('class_id' => $classId));
        }
    }
?>
