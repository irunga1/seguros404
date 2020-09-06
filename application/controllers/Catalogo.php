<?php 
    class Catalogo extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"Catalogo");
            if(isset($this->session->login)){
                $this->isSession = $this->session->login[0]->nombreusuario;
            }
            else{
                $this->isSession ="";
            }
        }
        public function otroscargos(){         
			
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_otroscargos');
            $crud->columns( 'descripcion');
            // $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Catalogo de Otros Cargos');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
            $output['title']= "Otros Cargos";
            // $output['menu']= $this->menu_model->getMenu();
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
        }
        public function descuentos(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_descuentos');
            $crud->columns( 'descripcion');
            // $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Catalogo de Deescuentos');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
            $output['title']= "Descuentos";
            // $output['menu']= $this->menu_model->getMenu();
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
        }
        public function cobertura(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_cobertura');
            $crud->columns( 'descripcion');
            // $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Catalogo Cobertura');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
			$output['title']= "Cobertura";
			$output['textarea'] =true;
            // $output['menu']= $this->menu_model->getMenu();
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
        }
        public function deducibles(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_deducible');
            $crud->columns( 'descripcion');
            // $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Deducibles');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
			$output['title']= "Tipos Seguro";
			
            $this->load->view('template',(array)$output);
        }
        public function iab(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_iab');
            $crud->columns( 'descripcion');
            // $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Catalogo IAB');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
            $output['title']= "Catalogo Seccion IAB";
            // $output['menu']= $this->menu_model->getMenu();
			// $this->load->view('template',$data);
			$output['textarea'] =true;
            $this->load->view('template',(array)$output);
        }
        public function iiab(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_iiab');
            $crud->columns( 'descripcion');
            // $crud->set_relation('tiposeguro_id','tipo_seguro','nombretiposeguro');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Catalogo IIAB');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
			$output['title']= "Catalogo Seccion IIAB";
			$output['textarea'] =true;
            $this->load->view('template',(array)$output);
        }
        public function iiiab(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
            }    
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_iiiab');
            $crud->columns( 'descripcion');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Catalogo IIIAB');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
			$output['title']= "Catalogo Seccion IIIAB";
			$output['textarea'] =true;
            $this->load->view('template',(array)$output);
        }
        public function primaneta(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
			} 
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('catalogo_primaneta');
            $crud->columns('descripcion');
            $crud->display_as('descripcion','Descripcion');
            $crud->set_subject('Catalogo Prima Neta');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
            $output['title']= "Prima Neta";
            $this->load->view('template',(array)$output);
        }
        public function configuracion(){            
            if($this->isSession ==""){
                $this->session->sess_destroy();
                redirect(base_url('login/index'));
			} 
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('configuracion');
            $crud->columns('nombreparametro','valor');
            $crud->display_as('nombreparametro','Titulo');
            $crud->set_subject('Configuracion');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "catalogos/index";
            $output['breadcrumb'] = "Inicio,Catalogos";
            $output['title']= "Configuracion";
            $this->load->view('template',(array)$output);
        }
        
    }

?>
