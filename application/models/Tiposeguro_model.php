<?php
class Tiposeguro_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function verify($id){
        $this->db->select("ts.tiposeguro_id,ts.nombretiposeguro,ts.aseguradora_id,
        ts.tipotarifa_id,a.nombre as 'aseguradora' ,tt.nombre as 'tipotarifa' ,
        tt.tipovehiculo_id, tv.descripcion as 'tipovehiculo' ,tt.porcentaje");
        $this->db->from('tipo_seguro ts');
        $this->db->join('tipo_tarifa tt','ts.tipotarifa_id = tt.tipotarifa_id');
        $this->db->join('aseguradora a','a.aseguradora_id = ts.aseguradora_id');
        $this->db->join('tipo_vehiculo tv','tv.tipovehiculo_id = tv.tipovehiculo_id');
		$this->db->where('tiposeguro_id',$id);
		
		$res = $this->db->get();
		// echo $this->db->last_query();die();
        $res = $res->result_object();
        return $res[0];
    }
    public function insertR($object){        
        $this->db->insert("recuperar_clave",$object);
        return  true;
    }
    public function callProcedure($string){
        // echo $string;
		$res = $this->db->query($string);
		// echo "<pre>";
		// print_r($res->result_object);
		// echo "</pre>";
		// die();
        return true;
    }
    // ---------------------------------
    //data para select
    public function otroscargos(){
        $query = "select * from catalogo_otroscargos";
        $data =$this->db->query($query);
        return $data->result_object();
    }
    //data para llenar 
    public function getOtrosCargos($aseguradora, $tipotarifa,$tiposeguro){
        // $query = "call obtiene_otroscargos($aseguradora, $tipotarifa,$tiposeguro)";
        $query = "SELECT * FROM seguro_otroscargos so  where so.tiposeguro_id  =  $tiposeguro";
        $data =$this->db->query($query);
        return $data->result_object();

    }
    // ----------------------------------
    //----------------------------------
    //data para select
    public function cobertura(){
        $query = "select * from catalogo_cobertura";
        $data = $this->db->query($query);
        return $data->result_object();
    }
    //data para llenar 
    public function getCoberturas($aseguradora, $tipotarifa,$tiposeguro){
        $query = "SELECT * FROM seguro_cobertura so  where so.tiposeguro_id  =  $tiposeguro";
        $dato =$this->db->query($query);
        if($dato !=null){
            return $dato->result_object();    
        }
        else{
            return [];
        }
    }
    // ----------------------------------
    //----------------------------------
    //data para select
    public function descuentos(){
        $query = "select * from catalogo_descuentos";
        $data =$this->db->query($query);
        return $data->result_object();
    }
    //data para llenar 
    public function getDescuento($aseguradora, $tipotarifa,$tiposeguro){
        $query = "SELECT * FROM seguro_descuentos so  where so.tiposeguro_id  =  $tiposeguro ";
        $data =$this->db->query($query);
        if($data !=null){
            return $data->result_object();    
        }
        else{
            return null;
        }
    }
    //data para select
    public function iab(){
        $query = "select * from catalogo_iab";
        $data =$this->db->query($query);
        return $data->result_object();
    }
    //data para llenar 
    public function getIab($aseguradora, $tipotarifa,$tiposeguro){
        $query = "SELECT * FROM seguro_iab so  where so.tiposeguro_id  =  $tiposeguro";
        $data =$this->db->query($query);
        if($data !=null){
            return $data->result_object();    
        }
        else{
            return null;
        }
    }
    //------------------------------------

    //data para select
    public function iiab(){
        $query = "select * from catalogo_iiab";
        $data =$this->db->query($query);
        return $data->result_object();
    }
    //data para llenar 
    public function getIiab($aseguradora, $tipotarifa,$tiposeguro){
        $query = "SELECT * FROM seguro_iiab so  where so.tiposeguro_id  =  $tiposeguro";
        $data =$this->db->query($query);
        if($data !=null){
            return $data->result_object();    
        }
        else{
            return null;
        }
    }
    //------------------------------------

    //------------------------------------
    //data para select
    public function iiiab(){
        $query = "select * from catalogo_iiiab";
        $data =$this->db->query($query);
        return $data->result_object();
    }
    //data para llenar 
    public function getIiiab($aseguradora, $tipotarifa,$tiposeguro){
        
        $query = "SELECT * FROM seguro_iiiab so  where so.tiposeguro_id  =  $tiposeguro";
        
        $data =$this->db->query($query);
        if($data !=null){
            return $data->result_object();    
        }
        else{
            return null;
        }
    }
    //-----------------------------------
    //data para select
    public function deducible(){
        $query = "select * from catalogo_deducible";
        $data =$this->db->query($query);
        return $data->result_object();
    }
    //data para llenar 
    public function getDeducible($aseguradora, $tipotarifa,$tiposeguro){
        $query = "SELECT * FROM seguro_deducibles so  where so.tiposeguro_id  =  $tiposeguro";
        $data =$this->db->query($query);
        if($data !=null){
            return $data->result_object();    
        }
        else{
            return null;
        }
    }
    public function primaneta(){
        $query = "SELECT * FROM catalogo_primaneta";  
		$data =$this->db->query($query);
		return $data->result_object();  

	}
	public function getClaseSeguro(){
		$this->db->select("claseseguro_id,nombre")->from("clase_seguro c");


		$res = $this->db->get();
		return  $res->result_object();
	}
	public function getPrimaneta($aseguradora, $tipotarifa,$tiposeguro){
        $query = "SELECT * FROM seguro_primaneta sp  where sp.tiposeguro_id  =  $tiposeguro";
        $data =$this->db->query($query);
        if($data !=null){
            return $data->result_object();    
        }
        else{
            return null;
        }
	}
	public function getPrimanetaMinima($id){
		$this->db->select("primanetaminima as pnm")->from("tipo_seguro")->where("tiposeguro_id",$id);
		$res = $this->db->get();
        $res = $res->result_object();
        return $res[0];
	}
	public function updatePNM($id,$obj){
		$this->db->where("tiposeguro_id",$id);
		$this->db->update("tipo_seguro",$obj);
		return  true;
	}





}

?>
