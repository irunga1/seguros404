<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error404 extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['view'] = "error/error404";        
        $data['breadcrumb'] = "Inicio,Error";
        $data['title'] = "Error 404";
        $data['menu']  = $this->menu_model->getMenu();

        $this->load->view("client",$data);
    }

}
