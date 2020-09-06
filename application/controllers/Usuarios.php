<?php 
    class Usuarios extends CI_Controller{
        private $isSession;
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->checksession->getData($this->session->login,"usuarios");
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
			$crud->set_table('usuario');
			$crud->columns('usuario','nombreusuario','email');
			$crud->display_as('nombre','Nombre');
			$crud->display_as('usuario','Usuario');
			$crud->display_as('clave','Clave');
            $crud->display_as('nombreusuario','Nombre usuario');
            $crud->display_as('email','Email');            
            $crud->required_fields('usuario_id','usuario','clave','nombreusuario','email');
            // $crud->callback_before_insert(array($this,'use_md5_password'));
            $crud->callback_before_insert(array($this,'encrypt_password'));
            //$crud->callback_before_update(array($this,'encrypt_password'));

            

            $crud->change_field_type('clave','password');
            $crud->set_subject('Usuario');
            $output = $crud->render();
            $output =  (array)$output;  
            $output['view'] = "usuarios/index";
            $output['breadcrumb'] = "Inicio,Usuario";
            $output['title']= "Usuario";
            // $this->load->view('template',$data);
            $this->load->view('template',(array)$output);
        }

        public function encrypt_password($post_array, $primary_key = null){
            $this->load->helper('security');
            $post_array['clave'] = do_hash($post_array['clave'], 'md5');
            return $post_array;
        }
   

        // public function encrypt_password($post_array, $primary_key = null){
        //     $this->load->library('encrypt');
        //     $post_array['clave'] = md5($post['clave']);
        //     $key = '';
        //     $post_array['clave'] = $this->encrypt->encode($post_array['clave'], $key);
        //     return $post_array;
        // }

    }

?>