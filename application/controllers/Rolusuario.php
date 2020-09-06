<?php 
    class Rolusuario extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"rolusuario");
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
			$crud->set_table('rol_usuario');
			$crud->columns('rol_id','usuario_id');
			$crud->display_as('rol_id','Rol');
			$crud->display_as('usuario_id','Usuario');
            $crud->required_fields('rol_id','usuario_id');
            $crud->set_relation('rol_id','rol','nombrerol');
            $crud->set_relation('usuario_id','usuario','usuario');
            $crud->set_subject('Rol Usuario');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "usuarios/index";
            $output['breadcrumb'] = "Inicio,Usuario";
            $output['title']= "Rol Usuario";
            
            $this->load->view('template',(array)$output);
        }

    }

?>
