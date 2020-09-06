<?php 
    class Menu_model extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        public function getMenu(){
            $data = $this->db->query('select * from menu');
            return $data->result_object();
        }

    }
?>