<?php 
    class Clientesauto_model extends CI_Model{
		private $db2;
        public function __construct(){
			parent::__construct();
			$this->db2 = $this->load->database('same', TRUE);
        }
        public function getAutos(){
            $this->db->select("marca_id,nombremarca")->from("marca_vehiculo");
            $data = $this->db->get();
            return $data->result_object();
        }
        public function getClaseSeguro(){
            $this->db->select("claseseguro_id,nombre")->from("clase_seguro");
            $data = $this->db->get();
            return $data->result_object();
        }
        public function getTipoVehiculo(){
            $this->db->select("tipovehiculo_id,descripcion")->from("tipo_vehiculo");
            $data = $this->db->get();
            return $data->result_object();
        }
        public function insertCotizacion($data){
            $this->db->insert('cotizacion', $data);
            $id = $this->db->insert_id();
            return $id;
        }
        public function insertCotAse($data,$cot){
            try {
				$this->db->delete("cotizacion_aseguradoras",array('cotizacion_id'=>$cot));
                $this->db->insert_batch('cotizacion_aseguradoras', $data);
                return true;
            } 
            catch (\Exception $e) {
                return false;
            }

        }
        public function executeQuery($param){
			$query= "call obtiene_cotizaciones($param)";
			// echo $query; die();
            $data = $this->db->query($query);
            return $data->result_object();
		}

        public function getPersonal2($param){
			$query= "SELECT c.nombre, c.email, c.clase_seguro, c.linea, mv.nombremarca, c.montoasegurado, tv.descripcion FROM cotizacion c JOIN marca_vehiculo mv ON mv.marca_id = c.marca_id JOIN tipo_vehiculo tv ON tv.tipovehiculo_id = c.tipovehiculo_id WHERE c.cotizacion_id = $param";
			$data = $this->db->query($query);
			
            return $data->result_object();
		}
        public function getDataPdf($param){
			$query= "CALL obtiene_cotizacion_seleccionada_calculos ($param)";
			$data = $this->db->query($query);
			
            return $data->result_object();
		}
		public function cualquiermierda(){
			$query = "select * from catalogo_iiiab";
			$data =$this->db->query($query);
			return $data->result_object();
		}
		public function getPersonal($param){
			$this->db->select("c.nombre,c.email, c.clase_seguro,c.linea, mv.nombremarca,c.montoasegurado,tv.descripcion")
			->from("cotizacion c")
			->join("marca_vehiculo mv","mv.marca_id = c.marca_id")
			->join("tipo_vehiculo tv","tv.tipovehiculo_id = c.tipovehiculo_id")
			->where('c.cotizacion_id',$param);
			$data2 = $this->db->get();
			return $data2->result_object();
		}
		public function otherData ($name, $inparam){
			$query ="select ts.tiposeguro_id, ts.tipotarifa_id , ts.nombretiposeguro from tipo_seguro ts
			where ts.nombretiposeguro  = '$name' and ts.aseguradora_id in ($inparam);";
			$data = $this->db->get();
			
			return $data->result_object();
		}
		public function getIAB($cotid){
			// $this->db2->select("'Seccion IAB' as titulo, ci.descripcion, si.valor, ts.aseguradora_id")
			$this->db2->select("'Seccion IAB' as titulo, si.valor,ci.descripcion, ts.aseguradora_id" )
			->from("seguro_iab si ")
			->join("catalogo_iab ci ","ci.catalogoiab_id = si.catalogoiab_id","RIGHT")
			->join("tipo_seguro ts","si.tiposeguro_id  = ts.tiposeguro_id","RIGHT")
			->join("cotizacion_aseguradoras ca", "ca.aseguradora_id=ts.aseguradora_id")
			->where('ca.cotizacion_id', $cotid );
			$data = $this->db2->get();
			
			$db_debug = $this->db2->db_debug;
			if(!$data){
				 print_r($this->db->error());
			}
			return $data->result();
		}
		public function getIIAB($cotid){
			$this->db2->select("'Seccion IIAB' as titulo, ci.descripcion, si.valor, ts.aseguradora_id")
			->from("seguro_iiab si ")
			->join("catalogo_iiab ci ","ci.catalogoiiab_id = si.catalogoiiab_id","RIGHT")
			->join("tipo_seguro ts","si.tiposeguro_id  = ts.tiposeguro_id","RIGHT")
			->join("cotizacion_aseguradoras ca", "ca.aseguradora_id=ts.aseguradora_id")
			->where('ca.cotizacion_id', $cotid );
			$data =$this->db2->get();
			return $data->result();
		}
		public function getIIIAB($cotid){
			$this->db2->select("'Seccion IIIAB' as titulo, ci.descripcion, si.valor, ts.aseguradora_id")
			->from("seguro_iiiab si ")
			->join("catalogo_iiiab ci ","ci.catalogoiiiab_id = si.catalogoiiiab_id","RIGHT")
			->join("tipo_seguro ts","si.tiposeguro_id  = ts.tiposeguro_id","RIGHT")
			->join("cotizacion_aseguradoras ca", "ca.aseguradora_id=ts.aseguradora_id")
			->where('ca.cotizacion_id', $cotid );
			$data =$this->db2->get();
			return $data->result();
		}
		public function getCoberturas($cotid){
			//$this->db2->select("'Seccion IIIAB' as titulo, cc.descripcion, sc.valor, ts.aseguradora_id")
			$this->db2->select("'Coberturas' as titulo, sc.valor,cc.descripcion,ts.aseguradora_id")
			->from("seguro_cobertura sc")
			->join("catalogo_cobertura cc ","cc.catalogocobertura_id = sc.catalogocobertura_id","RIGHT")
			->join("tipo_seguro ts","sc.tiposeguro_id  = ts.tiposeguro_id","RIGHT")
			->join("cotizacion_aseguradoras ca", "ca.aseguradora_id=ts.aseguradora_id")
			->where('ca.cotizacion_id', $cotid );
			$data =$this->db2->get();
			return $data->result();
		}
		public function getConfig(){
			$this->db2->select("nombreparametro,valor ")->from("configuracion")->where("nombreparametro","emailventas");
			$data = $this->db2->get();
			return $data->result();

		}
		public function updateCotizacion($data, $id){
			$this->db2->where('cotizacion_id',$id);
			$this->db2->update('cotizacion',$data);
			// $a =$this->db2->last_query();
			// echo "a.... ".$a;
			return true;
		}

    }
?>
