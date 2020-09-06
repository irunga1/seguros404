<?php 
    class Marcavehiculo extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"marcavehiculo");
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
            $data['view'] = "marcavehiculo/index";        
            $data['breadcrumb'] = "Inicio,Marcas Vehículo";
            $data['title'] = "Marcas Vehículo";
            $data['menu']  = $this->menu_model->getMenu();
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
			$crud->set_table('marca_vehiculo');
			$crud->columns('nombremarca');
			$crud->display_as('nombremarca','Marca');
            $crud->set_subject('Marcas Vehículo');
            $crud->required_fields('nombremarca' );
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "marcavehiculo/index";
            $output['breadcrumb'] = "Inicio,Marcas Vehículo";
            $output['title']= "Marcas Vehículo";
            
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
            
            
        }

    }

?>
