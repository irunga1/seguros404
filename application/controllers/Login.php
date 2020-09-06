<?php 
class  Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library("randomize");
		$this->load->model('login_model');
		$this->load->model("Clientesauto_model","cam");
		$this->load->model("Tiposeguro_model","tsm");
        $this->load->library("email");
    }
    public function index(){        
        $data['title'] = "Protegemos|login";
        $this->load->view("templatel",$data);
    }
    public function indexPost(){ 
        $datos['title'] = "Protegemos|login";        
        $post = $this->input->post(NULL, TRUE);
        $this->form_validation->set_rules('usuario', 'usuario', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('clave', 'clave', 'trim|required|min_length[8]|max_length[16]');        
        if ($this->form_validation->run() == true) {
			
            $usuario = $this->clearstring->getValue($post['usuario']);
			$clave = filter_var($post['clave'],FILTER_SANITIZE_SPECIAL_CHARS);
			// echo "usuario".$usuario;
			// echo "clave:".$clave;
			// die();
            $clave = md5($clave);
            $data = $this->login_model->login($usuario,$clave);
            if($data != null){
                $session =array("login"=>$data);
                $this->session->set_userdata($session);
                redirect(base_url('dashboard/index'));
            }
            else{
                $this->session->mark_as_flash('Usuario o Contraseña Invalida');                
                $datos['error'] = 'Usuario o Contraseña Incorrecta | Cuenta no tiene Permisos';
                $this->load->view('templatel',$datos);
            }
        }
        else{
            $this->load->view('templatel',$datos);
        }
    }
    public function codigo(){
        $strRnd = $this->randomize->genWord();        
        $data['view'] = "cuestionario/codigo";
        $data['codigo'] = $strRnd;
        $data['breadcrumb'] = "Inicio,Codigo";
        $data['title'] = "Generar Codigo";
        $data['menu']  = $this->menu_model->getMenu();
        $this->load->view("template",$data);
    }
    public function recuperarclave(){
        $data['title'] = "Protegemos|login";
        $this->load->view("templatelr",$data);
    }
    public function recuperarclavePost(){ 
        $datos['title'] = "Protegemos|login";        
        $post = $this->input->post(NULL, TRUE);
        $this->form_validation->set_rules('correo', 'correo', 'trim|required|min_length[9]|max_length[80]|valid_email');
        if ($this->form_validation->run() == true){
            $correo = $this->clearstring->removeTags2($post['correo']);
            $object = $this->login_model->recuperar($correo);
            // print_r(isset($object));die();
            if(isset($object)){
                $insert = array(
                    "correo"=>$object[0]->email,
                    "clave"=>md5($object[0]->email.date("Y-m-d H:i:s")),
                    "fecha"=> date("Y-m-d")
                );
                $id = $this->login_model->insertR($insert);
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['smtp_user'] = "no-reply@sin404.com";
                $config['smtp_pass'] = 'Cremas2020$';
                $config['smtp_port'] = '290';
                $config['smtp_host'] = 'mail.sin404.com';
                $config['smtp_crypto'] = 'ssl';
                $config['mailtype'] = 'html';
                $config['charset'] = 'utf-8';
                $url ="<a href='".base_url('login/inserthash')."'> Ir</a>";
                

                $this->email->initialize($config);
                $this->email->from('no-replay@sin404.com');
                $this->email->to($object[0]->email);
                $this->email->subject('Recuperacion contraseña');
                $this->email->message('
                    <h1>Recuperar Contraseña </h1>
                    Copie y pegue el siguiente codigo '. $insert['clave'] . 'en el siguiente link '.$url )."<br> <strong>La nueva contraseña debera contener al menos 8 caracteres alfanumericos</stron>";
                $this->email->send();        

                redirect(base_url("login/insertHash"));
            }
            else{
                echo "entra aca"; die();
                redirect(base_url("login/recuperarclave"));
            }
            
        }
        else{
            $this->load->view('templatelr',$datos);
        }
    }
    public function insertHash(){
        $data['title'] = "Protegemos|login";
        $this->load->view("templatelr2",$data);
    }
    public function insertHashPost(){ 
        $datos['title'] = "Protegemos|login";        
        $post = $this->input->post(NULL, TRUE);
        $this->form_validation->set_rules('hash', 'hash', 'trim|required|min_length[30]|max_length[50]|alpha_numeric');
        $this->form_validation->set_rules('clave', 'clave', 'trim|required|min_length[8]|max_length[16]|alpha_numeric');
        $this->form_validation->set_rules('clave2', 'clave', 'trim|required|min_length[8]|max_length[16]|alpha_numeric|matches[clave]');
        if ($this->form_validation->run() == true){
            $hash = $this->clearstring->removeTags2($post['hash']);
            $object = $this->login_model->searchHash($hash);
            if((isset($object))&& ($object!= false)){
                $this->login_model->changePass($post['clave'],$object->correo);
                $this->session->mark_as_flash('Cambio realizado con exito');                
                $datos['success'] = 'Cambio realizado con exito';
                $this->load->view('templatelr2',$datos);
            }
            else{
                $this->session->mark_as_flash('Usuario o Contraseña Invalida');                
                $datos['error'] = 'No se pudo Realizar el cambio intentelo de nuevo';
                $this->load->view('templatelr2',$datos);
            }
        }
        else{
            $this->load->view('templatelr2',$datos);
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login/index'));
	}
	public function test(){
		$data["data"]= $this->tsm->cualquiermierda();
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}
?>
