<?php 
class Formatopdf extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
	}
	public function index(){
		$data["size"] =1;
		$this->load->view("pdf/formatopdf",$data);
	}
}
?>
