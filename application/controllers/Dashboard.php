<?php 
class  Dashboard extends CI_Controller{
    public function __construct(){
		parent::__construct();
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
        $data['view'] = "dashboard/index";        
        $data['breadcrumb'] = "Cotizaciónes";
		$data['title'] = "Cotiziaciones";
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('cotizacion');
		$crud->columns("cotizacion_id","nombre","marca_id","tipovehiculo_id","linea","anual","montoasegurado","clase_seguro", "esventa","pdfurl","fechacotizacion");
		$crud->callback_column('pdfurl',array($this,'_callback_url'));
		$crud->callback_column('esventa',array($this,'_callback_venta'));
		$crud->display_as('cotizacion_id','Id');
		$crud->display_as('fechacotizacion','Fecha y Hora');
		$crud->display_as('montoasegurado','Monto Asegurado');
		$crud->display_as('marca_id','Marca');
		$crud->display_as('tipovehiculo_id','Tipo de Vehículo');
		$crud->display_as('clase_seguro','Tipo de Seguro');
		$crud->display_as('anual','Modelo');
		// $crud->display_as('pdfurl','Documento');
		$crud->display_as('pdfurl','Archivo');
		$crud->display_as('esventa','Venta Cotización');
		$crud->set_relation('tipovehiculo_id','tipo_vehiculo','descripcion');
		$crud->set_relation('marca_id','marca_vehiculo','nombremarca');
		$crud->set_subject('Cotizaciónes');
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$output = $crud->render();
		$output =  (array)$output;  
		$output['view'] = "catalogos/index";
		$output['breadcrumb'] = "Inicio,Cotizaciónes";
		$output['title']= "Cotizaciónes";
        $this->load->view("template",$output);
	}
	public function _callback_url($value, $row){
		if(isset($row->pdfurl)){			
			return "<a target='_blank' href='".$row->pdfurl."'><span class='glyphicon glyphicon-download' aria-hidden='true'></span></a>";
		}
	}
	public function _callback_venta($value, $row){
		if($row->esventa == 1){
			return "Venta";
		}
		else{
			return "Cotización";
		}
	}
}
?>
