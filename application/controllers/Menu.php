<?php 
class Menu extends CI_Controller{
    private $isSession;
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
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
        $data['view'] = "clientesauto/index";        
        $data['breadcrumb'] = "Inicio,Dashboard";
        $data['title'] = "Dashboard";
        $this->load->view("client", $data);
    }
    public function listing(){
       $crud = new grocery_CRUD();
       $crud->set_table('menu');
       $output = $this->grocery_crud->render();
    }
    public function details($ids = ""){
        
    }
}
?>
