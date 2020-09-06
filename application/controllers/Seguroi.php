<?php 
    class Seguroi extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"seguroi");
            if(isset($this->session->login)){
                $this->isSession = $this->session->login[0]->nombreusuario;
            }
            else{
                $this->isSession ="";
            }
            
        }
        public function iab(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('seguro_iab');
            $crud->columns(  'tiposeguro_id', 'descripcion', 'valor');
            $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('nombretiposeguro','Tipo de Seguro');
            $crud->set_subject('Tipos de Seguro');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "tipo_seguro/index";
            $output['breadcrumb'] = "Inicio,Tipo Seguro";
            $output['title']= "Tipos Seguro";
            $output['menu']= $this->menu_model->getMenu();
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
        }
        public function iiab(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }               
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');            
            $crud->set_table('seguro_iiab');
            $crud->columns(  'tiposeguro_id', 'descripcion', 'valor');
            $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('nombretiposeguro','Tipo de Seguro');
            $crud->set_subject('Tipos de Seguro');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "tipo_seguro/index";
            $output['breadcrumb'] = "Inicio,Tipo Seguro";
            $output['title']= "Tipos Seguro";
            $output['menu']= $this->menu_model->getMenu();
            $this->load->view('template',(array)$output);
        }
        public function iiiab(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }                     
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('seguro_iiiab');
            $crud->columns( 'tiposeguro_id', 'descripcion', 'valor');
            $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('nombretiposeguro','Tipo de Seguro');
            $crud->set_subject('Tipos de Seguro');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "tipo_seguro/index";
            $output['breadcrumb'] = "Inicio,Tipo Seguro";
            $output['title']= "Tipos Seguro";
            $output['menu']= $this->menu_model->getMenu();
            
            $this->load->view('template',(array)$output);
        }

    }

?>