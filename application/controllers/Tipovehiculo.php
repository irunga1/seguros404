<?php 
    class Tipovehiculo extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"tipovehiculo");
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
            // $crud->set_theme('datatables');
            $crud->set_table('tipo_vehiculo');
            $crud->set_theme('datatables');
			$crud->columns('descripcion');
            $crud->display_as('descripcion','Tipo de Vehículo');
            $crud->required_fields('descripcion');
            $crud->set_subject('Tipos de  Vehículo');
            $output = $crud->render();
            //$data['output'] = (array)$output;
            $output =  (array)$output;  
            $output['view'] = "tipo_vehiculo/index";
            $output['breadcrumb'] = "Inicio,Tipo Vehículo";
            $output['title']= "Tipos Vehículo";
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
            
            
        }

    }

?>
