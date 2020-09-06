<?php 
    class Aseguradora extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"aseguradora");
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
			$crud->set_table('aseguradora');
			$crud->columns('nombre', 'direccion', 'contacto', 'email', 'telefono');
			$crud->display_as('nombre','Nombre');
			$crud->display_as('direccion','Direccion');
			$crud->display_as('contacto','Contacto');
			$crud->display_as('telefono','Teléfono');
			$crud->set_relation('aseguradora_id','tipo_seguro','aseguradora_id');
            $crud->set_field_upload('logotipo','assets/uploads/files');
            $crud->required_fields('nombre','direccion','contacto','email','logotipo');
            $crud->set_subject('Aseguradora');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "aseguradora/index";
            $output['breadcrumb'] = "Inicio,Aseguradoras";
            $output['title']= "Aseguradoras";
            
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
            
            
        }

    }

?>
