<?php 
    class Temporal extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
            $this->load->model('tiposeguro_model');
			$this->load->model('tiposeguro2_model');
			$this->load->library("Con2");
            // $this->checksession->getData($this->session->login,"temporal");
            if(isset($this->session->login)){
                $this->isSession = $this->session->login[0]->nombreusuario;
            }
            else{
                $this->isSession ="";
            }
        }
        public function config($param =null){
			if($this->isSession ==""){
				$this->session->sess_destroy();
				redirect(base_url('login/index'));
			} 
            if($param==null){                
                redirect(base_url("dashboard/index"));
            }
            $temp = $this->tiposeguro_model->verify($param);
            if($temp->tiposeguro_id != $param){
				// echo "<pre>";
				// print_r($temp);
				// echo "</pre>";
				// echo "<pre>";
				// print_r($param);
				// echo "</pre>";
                //redirect(base_url("dashboard/index"));
            }
            $data['view'] = "temporal/index";
            $data['breadcrumb'] = "Inicio,Configuracion Tipo Seguro";
            $data['title']= "Tipos Seguro";
            $data['tiposeguro'] = $param;
            $data["nombretiposeguro"] = $temp->nombretiposeguro;
            $data["aseguradora_id"] = $temp->aseguradora_id;
            $data["tipotarifa_id"] = $temp->tipotarifa_id;
            $data["nombretarifa"] = $temp->tipotarifa_id;
            $data["aseguradora"] = $temp->aseguradora;
            $data["tipotarifa"] = $temp->tipotarifa;
            $data["tipovehiculo"] = $temp->tipovehiculo;
            $data["porcentaje"] = $temp->porcentaje;
            $data["tipovehiculo_id"] = $temp->tipovehiculo_id;
            //---------------------------------    
            $data['cobertura']=$this->tiposeguro_model->cobertura();
            $data['descuentos']=$this->tiposeguro_model->descuentos();
            $data['deducible']=$this->tiposeguro_model->deducible();
            $data['iab']=$this->tiposeguro_model->iab();
            $data['iiab']=$this->tiposeguro_model->iiab();
            $data['iiiab']=$this->tiposeguro_model->iiiab();
            $data['primaneta']=$this->tiposeguro_model->primaneta();
            $data['otroscargos']=$this->tiposeguro_model->otroscargos();
            //---------------------------------
            $data['isotroscargos'] =$this->tiposeguro_model->getOtrosCargos(1,1,$param);
            $data['isprimaneta'] =$this->tiposeguro_model->getPrimaneta(1,1,$param);
            $data['iscobertura'] =$this->tiposeguro2_model->getCoberturas(1,1,$param);
            $data['isdescuentos'] =$this->tiposeguro_model->getDescuento(1,1,$param);
            $data['isiab'] =$this->tiposeguro_model->getIab(1,1,$param);
            $data['isiiab'] =$this->tiposeguro_model->getIiab(1,1,$param);
            $data['isiiiab'] =$this->tiposeguro_model->getIiiab(1,1,$param);
            $data['isdeducible'] =$this->tiposeguro_model->getDeducible(1,1,$param);
			$data['pnm'] =$this->tiposeguro_model->getPrimanetaMinima($param);
			// echo "<pre>";
			// print_r($data["pnm"]);
			// echo "</pre>";
			$this->load->view('template',$data);


		}
		public function pnm(){
			$post = $this->input->post();
			$ts =$this->clearstring->removeTags2($post["tiposeguro"]);
			$valor = $this->clearstring->removeTags2($post["valor"]);
			$array = array(
				"tiposeguro_id"=>$ts,
				"primanetaminima"=>$valor
			);
			$a =$this->tiposeguro_model->updatePNM($ts,$array);
			if($a== true){
				echo "success";
			}
		
		}

        public function insanddelete(){
            $post = $this->input->post();
            $tipo = $post['operacion'];
			$keys = array_keys($post);
			// echo "<pre>";
			// print_r($post);
			// echo "</pre>";
			// die();
            $a =[0,1,2];
            foreach($keys as $it){
                $temp = (array)$post[$it];
                $size =  sizeof($temp);                        
                for($i=0;$i<(integer)$size;$i++){
                    $temp[$i] = $this->clearstring->removeTags2($temp[$i]);
                }
                $temp2[$it] =$temp;
            }
            $ase = $temp2['aseguradora'][0];
            $ts = $temp2['tiposeguro'][0];
			$tt = $temp2['tipotarifa'][0];

            switch($tipo){
                case"otroscargos":
					//aseguradora,tiposeguro,tipotarifa
                    // $string = "call edita_otroscargos($ase,$ts,$tt,'Insert into seguro_otroscargos (tiposeguro_id, sequencial, catalogootrocargo_id, valor, operacion,aplicadescuento) ";
                    $string = "call edita_otroscargos($ase,$ts,$tt,'Insert into seguro_otroscargos (tiposeguro_id, sequencial, catalogootrocargo_id, valor, operacion) ";
                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.="".$temp2['posicion'][$i].",";
                        $string.="".$temp2['descripcion'][$i].",";
                        $string.="".$temp2['valor'][$i].",";
                        $string.="\"".$temp2['masmenos'][$i]."\"";
                        $string.="),";
                    }
					$string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
					// echo $string; die();					
                    $a =$this->tiposeguro_model->callProcedure($string);
                    if($a== true){
                        echo "success";
                    }
                break;
                case"primaneta":
                    //aseguradora,tiposeguro,tipotarifa
							 //call edita_primaneta(1,1,1,'INSERT INTO seguro_primaneta (tiposeguro_id, catalogoprimaneta_id, sequencial, valor, operacion)
							 //call edita_primaneta(1,1,1,'Insert into seguro_primaneta (tiposeguro_id, catalogoprimaneta_id, sequencial, valor, operacion) values(1,"7","1","4","%"),(1,"8","2","125","+"),(1,"9","3","25","+");',1)
                    // $string = "call edita_primaneta($ase,$ts,$tt,'Insert into seguro_primaneta (tiposeguro_id, catalogoprimaneta_id, sequencial, valor, operacion) ";
                    $string = "call edita_primaneta($ase,$ts,$tt,'Insert into seguro_primaneta (tiposeguro_id, catalogoprimaneta_id, sequencial, valor, operacion,aplicadescuento) ";
                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.="\"".$temp2['descripcion'][$i]."\",";
						$string.="\"".$temp2['posicion'][$i]."\",";
						$string.="\"".$temp2['valor'][$i]."\",";
                        // $string.="\"".$temp2['masmenos'][$i]."\"";
                        $string.="\"".$temp2['masmenos'][$i]."\",";
                        $string.="\"".$temp2['descuento'][$i]."\"";
                        $string.="),";
                    }
                    $string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
                    // echo $string; die();
                    $a =$this->tiposeguro_model->callProcedure($string);
                    if($a== true){
                        echo "success";
                    }
                break;
                case "coberturas":
                    //aseguradora,tiposeguro,tipotarifa
                    //call edita_cobertura (1,1,1,'Insert into seguro_cobertura (tiposeguro_id,catalogocobertura_id, valor) values(1,1,"cobertura 1"),(1,2,"cobertura 2"),(1,3,"cobertura 3");',1);
                    $string = "call edita_cobertura($ase,$ts,$tt,'Insert into seguro_cobertura (tiposeguro_id,catalogocobertura_id, valor)";
                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.="\"".$temp2['descripcion'][$i]."\",";
                        $string.="\"".$temp2['valor'][$i]."\"";
                        $string.="),";
                    }
                    $string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
                    echo $string;
                    $a =$this->tiposeguro_model->callProcedure($string);
                    if($a== true){
                        echo "success";
                    }
                break;
                case "iab":
                    //aseguradora,tiposeguro,tipotarifa
                    //call edita_iiiab (1,1,1,'Insert into seguro_iiiab (tiposeguro_id,catalogoiiiab_id, valor)values(1,1,"detalle iiiab 1"),(1,1,"detalle iiiab 2");',1);
                    $string = "call edita_iab($ase,$ts,$tt,'Insert into seguro_iab (tiposeguro_id,catalogoiab_id, valor)";
                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.="\"".$temp2['descripcion'][$i]."\",";
                        $string.="\"".$temp2['valor'][$i]."\"";
                        $string.="),";
                    }
                    $string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
                    // echo$string;
                    $a =$this->tiposeguro_model->callProcedure($string);
                    if($a== true){
                        echo "success";
                    }
                    
                break;
                case "iiab":
                    //aseguradora,tiposeguro,tipotarifa
                    //call edita_iiiab (1,1,1,'Insert into seguro_iiiab (tiposeguro_id,catalogoiiiab_id, valor)values(1,1,"detalle iiiab 1"),(1,1,"detalle iiiab 2");',1);
                    $string = "call edita_iiab($ase,$ts,$tt,'Insert into seguro_iiab (tiposeguro_id,catalogoiiab_id, valor)";
                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.=$temp2['descripcion'][$i].",";
                        $string.="\"".$temp2['valor'][$i]."\"";
                        $string.="),";
                    }
                    $string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
                    
                    $a =$this->tiposeguro_model->callProcedure($string);
                    if($a== true){
                        echo "success";
                    }
                    
                break;
                case"iiiab": 
                    //aseguradora,tiposeguro,tipotarifa
                    //call edita_iiiab (1,1,1,'Insert into seguro_iiiab (tiposeguro_id,catalogoiiiab_id, valor)values(1,1,"detalle iiiab 1"),(1,1,"detalle iiiab 2");',1);
                    $string = "call edita_iiiab($ase,$ts,$tt,'Insert into seguro_iiiab (tiposeguro_id,catalogoiiiab_id, valor)";
                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.="\"".$temp2['descripcion'][$i]."\",";
                        $string.="\"".$temp2['valor'][$i]."\"";
                        $string.="),";
                    }
                    $string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
                    //echo$string;
                    $a =$this->tiposeguro_model->callProcedure($string);
                    if($a== true){
                        echo "success";
                    }                   
                break;

                case"descuentos":
                    //aseguradora,tiposeguro,tipotarifa
                    //call edita_descuentos (1,1,1,'Insert into seguro_descuentos (tiposeguro_id,catalogodescuento_id, valor,  esvalorfijo, essobreprima) values(1,1,5,"si","si"),(1,2,30,"si","si");',1);
                    $string = "call edita_descuentos($ase,$ts,$tt,'Insert into seguro_descuentos (tiposeguro_id, catalogodescuento_id, valor) ";
                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.="\"".$temp2['descripcion'][$i]."\",";
                        $string.="\"".$temp2['valor'][$i]."\"";                        
                        $string.="),";
                    }
                    $string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
                    
					$a =$this->tiposeguro_model->callProcedure($string);
					
                    if($a== true){
                        echo "success";
                    }                    
                break;

                case"deducibles":
                    
                    
                    //         call edita_deducibles(1,1,1,'Insert into seguro_deducibles (tiposeguro_id,catalogodeducible_id, valor, essuma, esvalorfijo, essobreprima) values(1,5,"4","%","no","no"),(1,5,"4","%","no","no");',1)
                    $string = "call edita_deducibles($ase,$ts,$tt,'Insert into seguro_deducibles (tiposeguro_id,catalogodeducible_id, valor, operacion) ";
                    

                    $string.="values";
                    $len = count($temp2["descripcion"]); 
                    $tiposeguro =$temp2['tiposeguro'][0];                  
                    for($i=0;$i<$len;$i++){
                        $string.="(";
                        $string.=$tiposeguro.",";
                        $string.="".$temp2['descripcion'][$i].",";
                        $string.="\"".$temp2['valor'][$i]."\",";
                        $string.="\"".$temp2['masmenos'][$i]."\"";
                        $string.="),";
                    }
                    
                    $string = substr($string,0,-1).";',".$this->session->userdata["login"][0]->usuario_id.")";
                    
					
					$data =$this->con2->runQuery($string);
                    if($a== true){
                        echo "success";
                    }
                    
                break;
            }
        }
        public function session(){
            echo"<pre>";
            
        }
    }

?>
