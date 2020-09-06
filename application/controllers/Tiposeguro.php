<?php 
    class Tiposeguro extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
			$this->checksession->getData($this->session->login,"tiposeguro");
			$this->load->model("Tiposeguro_model","tsm");
            if(isset($this->session->login)){
                $this->isSession = $this->session->login[0]->nombreusuario;
            }
            else{
                $this->isSession ="";
            }
            
        }
        public function index(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            } 
            $crud = new grocery_CRUD();  
            $crud->set_theme('datatables');
            $crud->set_table('tipo_seguro');
            $crud->columns('nombretiposeguro','aseguradora_id','tipotarifa_id');
            $crud->set_relation('aseguradora_id','aseguradora','nombre');
            $crud->set_relation('tipotarifa_id','tipo_tarifa','nombre');
            $crud->display_as('aseguradora_id','Aseguradora');
            $crud->display_as('tipotarifa_id','Tipo de Tarifa');
			// $crud->display_as('primanetaanual','Prima Neta Anual');
			$crud->required_fields('nombretiposeguro', 'aseguradora_id', 'tipotarifa_id');
            $crud->display_as('nombretiposeguro','Nombre Seguro');
            $crud->set_subject('Tipos de Tarifa');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "tipo_seguro/index";
            $output['breadcrumb'] = "Inicio,Tipo de Tarifa";
			$output['title']= "Tipos de Tarifa";
			$output["clase_seguro"] = $this->tsm->getClaseSeguro();
			// echo "<pre>";
			// print_r($output['clase_seguro']);
			// echo "</pre>";
			// die();
            $this->load->view('template',(array)$output);
        }

    }

?>
