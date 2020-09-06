<?php 
    class Tipotarifa extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"tipotarifa");
            if(isset($this->session->login)){
                $this->isSession = $this->session->login[0]->nombreusuario;
            }
            else{
                $this->isSession ="";
            }
        }
        public function index(){
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
			$crud->set_table('tipo_tarifa');
			$crud->columns('nombre', 'nombre_corto', 'tipovehiculo_id');
			$crud->display_as('nombre','Nombre');
			$crud->display_as('direccion','Direccion');
			$crud->display_as('contacto','Contacto');
            $crud->display_as('telefono','Teléfono');
            $crud->display_as('tipovehiculo_id','Tipo de Vehículo');
            $crud->set_field_upload('logotipo','assets/uploads/files');
            $crud->set_relation('tipovehiculo_id','tipo_vehiculo','descripcion');
            $crud->required_fields('nombre', 'nombre_corto', 'tipovehiculo_id');
			$crud->set_subject('Clases de Tarifa');
			$crud->unset_add();
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "tipotarifa/index";
            $output['breadcrumb'] = "Inicio,Clases de Tarifa";
            $output['title']= "Clases de Tarifa";
            
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
            
            
        }

    }

?>
