<?php
class Tiposeguro2_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getCoberturas($aseguradora, $tipotarifa,$tiposeguro){
       
        $this->db->select('*');
        $this->db->from('seguro_cobertura');
        $this->db->where('tiposeguro_id', $tiposeguro);
        $data = $this->db->get();
        
        return $data->result_object();
       
    }
    // ----------------------------------
    public function getDescuento($aseguradora, $tipotarifa,$tiposeguro){
        try {
            //code...
            $query = "SELECT * FROM seguro_descuentos so  where so.tiposeguro_id  =  $tiposeguro ";
            $dato =$this->db->query($query);
            if($dato !=null){
                return $dato->result_object();    
            }
            else{
                return [];
            }

        } catch (\Exception $e) {
            //throw $th;
            $e->getMessage();
            return [];
        }

    }
    //------------------------------------

    //-----------------------------------
    //data para select

    //data para llenar 
    public function getIab($aseguradora, $tipotarifa,$tiposeguro){
        $query = "call obtiene_descuentos($aseguradora, $tipotarifa,$tiposeguro)";
        $data =$this->db->query($query);
        if($data !=null){
            return $data->result_object();    
        }
        else{
            return null;
        }
    }
    //------------------------------------

    //data para llenar 
    public function getIiab($aseguradora, $tipotarifa,$tiposeguro){
        $query = "call obtiene_descuentos($aseguradora, $tipotarifa,$tiposeguro)";
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

    public function getIiiab($aseguradora, $tipotarifa,$tiposeguro){
        $query = "call obtiene_descuentos($aseguradora, $tipotarifa,$tiposeguro)";
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

    public function getDeducible($aseguradora, $tipotarifa,$tiposeguro){
        $query = "call obtiene_descuentos($aseguradora, $tipotarifa,$tiposeguro)";
        $data =$this->db->query($query);
        return $data->result_object();
    }


}

?>