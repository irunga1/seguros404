<?php 
class Clienteautos extends CI_Controller{
	
    public function __construct(){
		parent::__construct();
		$this->load->library("Util");
        $this->load->library("Captcha");
        $this->load->library("Pdf");
		$this->load->library("Con2");
		$this->load->library("email");
		$this->load->model("Clientesauto_model","cam");
    }
    public function index(){
		// echo   'http://'.$_SERVER['HTTP_HOST'];die();

        $data['marcas'] = $this->cam->getAutos();
        $data['clasesguro'] = $this->cam->getClaseSeguro();
        $data['tipovehiculo'] = $this->cam->getTipoVehiculo();
        $data['view'] = "clientesauto/index";        
        $data['breadcrumb'] = "Inicio,Dashboard";
		$data['title'] = "Protegemos - Cotización";
		$data['year'] = date("Y")+2;
        // echo "<pre>";
        // print_r($data);die();
        $this->load->view("client", $data);
    }
    //http://localhost/segurosautomovil/clientesauto/indexpost
    public function indexpost(){
        // echo "<pre>";
        // print_r($this->session->userdata);die();
        $data['marcas'] = $this->cam->getAutos();
        $data['clasesguro'] = $this->cam->getClaseSeguro();
        $data['tipovehiculo'] = $this->cam->getTipoVehiculo();
        $data['view'] = "clientesauto/index";        
        $data['breadcrumb'] = "Inicio,Dashboard";
        $data['title'] = "Protegemos - Cotización";
        $data['year'] = date("Y")+2;
        $post = $this->input->post(NULL, TRUE);
        $post2 = $this->input->post(NULL, TRUE);
        $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|min_length[3]|max_length[70]|regex_match[/^([a-z ])+$/i]');
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|min_length[8]|max_length[80]|valid_email');        
        $this->form_validation->set_rules('Marca', 'Marca', 'trim|required|integer');        
        $this->form_validation->set_rules('Tipovehiculo', 'Tipo de Vehículo', 'trim|required|integer');        
        $this->form_validation->set_rules('Linea', 'Línea', 'trim|required|min_length[2]|max_length[40]|alpha_numeric_spaces');        
        $this->form_validation->set_rules('Modelo', 'Modelo', 'trim|required|min_length[4]|max_length[4]|integer');        
        $this->form_validation->set_rules('Valor', 'Valor', 'trim|required|min_length[4]|max_length[16]');        
        $this->form_validation->set_rules('clase_seguro', 'Tipo de Seguro', 'trim|required|min_length[2]|max_length[40]|alpha_numeric_spaces');        
		$this->form_validation->set_rules('captcha', 'captcha', 'trim|required|min_length[5]|max_length[6]|alpha_numeric');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|min_length[8]|max_length[10]|integer');
		$this->form_validation->set_rules('Nit', 'Nit', 'trim|required|min_length[8]|max_length[9]|regex_match[/^([kK0-9])+$/i]');
        

        if ($this->form_validation->run() == true) {
            $post["Nombre"] = $this->clearstring->getValue($post['Nombre']);
            $post["Email"] = $this->clearstring->getValue($post['Email']);
            $post["Nit"] = $this->clearstring->getValue($post['Nit']);
            $post["Marca"] = $this->clearstring->getValue($post['Marca']);
            $post["Tipovehiculo"] = $this->clearstring->getValue($post['Tipovehiculo']);
            $post["Linea"] = $this->clearstring->getValue($post['Linea']);
            $post["Modelo"] = $this->clearstring->getValue($post['Modelo']);
			$post["Valor"] = $this->clearstring->getValue($post['Valor']);
			$post["Valor"] = str_replace(",","",$post["Valor"]);
			$post["clase_seguro"] = $this->clearstring->getValue($post['clase_seguro']);
			if($post["clase_seguro"] =="Seguro Terceros"){
				$post["Valor"] =0;
			}
			$post["captcha"] = $this->clearstring->getValue($post['captcha']);
            if($post['captcha'] ==$this->session->userdata["captcha"]){
                $data = [
                    "nombre"=>$post["Nombre"],
                    "email"=>$post["Email"],
                    "marca_id"=>$post["Marca"],
                    "linea"=>$post["Linea"],
                    "tipovehiculo_id"=>$post["Tipovehiculo"],
                    "anual"=>$post["Modelo"],
                    "montoasegurado"=>$post["Valor"],
                    "clase_seguro"=>$post["clase_seguro"],
                    "nit"=>$post["Nit"],
                    "telefono"=>$post["telefono"]
				];
				$id =$this->cam->insertCotizacion($data);
                $result = $this->cam->executeQuery($id);
                $data['view'] = "clientesauto/list";        
                $data['breadcrumb'] = "Inicio,Dashboard";
                $data['title'] = "Protegemos - Cotización";
                $data['result'] = $result;
				$data['cotid'] = $id;
				$data['clase_seguro']=$post["clase_seguro"];
				$data['post'] = $post;
				$data['post2'] = $this->con2->runQuery("CALL obtiene_confirmacion (".$id.")");
				// echo "<pre>";
				// print_r($data["result"]);
				// echo "</pre>";
				// die();

				
                $this->load->view("client", $data);
            }
            else{
				$datos = $data;
                $datos['error'] = 'Error en el captcha | Intente Nuevamente';
                $datos['post'] = $post;
                $this->load->view('client',$datos);                
            }

        }
        else{
			//$this->session->mark_as_flash('Usuario o Contraseña Invalida');                
			$data['post'] = $post2;
			$data['error'] = 'Datos Incorrectos ';
			
            $this->load->view('client',$data);
        }
        
    }
    public function generatePdf($idcot, $aseguradoras){
		$aseguradoras = $this->clearstring->removeTags2($aseguradoras);
		$ase = explode("-",$aseguradoras);
		$ase2 ="";
		$get = $this->input->get();
		$ts = $this->clearstring->removeTags2($get["tiposeguro"]);
        $tt = $this->clearstring->removeTags2($get["tipotarifa"]);



		$ts = explode("-",$ts);
		$tt = explode("-",$tt);
		foreach($ase as $it){
			$ase2.=$it.",";
		}
		$ase2 = substr($ase2,0,-1);
        if(count($ase)<4){
            for($i = 0; $i<count($ase);$i++){
                $insert[$i]["cotizacion_id"] =$idcot;
                $insert[$i]["aseguradora_id"] =$ase[$i];
                $insert[$i]["tiposeguro_id"] =$ts[$i];
                $insert[$i]["tipotarifa_id"] =$tt[$i];
            }
            $id = $this->cam->insertCotAse($insert,$idcot);
            
            if(true == true){
				$values = array_values($insert);
				$data["size"] = sizeof($values);				
				$data['personal'] =$this->cam->getPersonal($idcot);
				$data["personal"][0]->idcot = $idcot;
				$data["personal"][0]->fecha = date('d/m/Y');
				$data["personal"][0]->telefono = "23278888";
				$data["personal"][0]->mail = "protegemosenlinea@protegemos.com.gt";

				$data['calculado'] = $this->cam->getDataPdf($idcot);
				$data['iab'] = $this->cam->getIAB($idcot);
				// $data["beneficios"][$title] = $temp[$title];
				$data["cob2"] = $this->con2->runQuery("CALL obtiene_cotizacion_seleccionada_cobertura($idcot)");
				$secciones= $this->con2->runQuery("CALL obtiene_cotizacion_seleccionada_seccionab($idcot)");
				$keys = $this->util->getKeys2($secciones,14);
				foreach($keys as $it){
					for($i=0; $i<count($secciones);$i++){
						if($secciones[$i][14]== $it){
							$data["secciones2"][$it][] = $secciones[$i];
						}
					}
					
				}
				// echo "<pre>";print_r($data["personal"]);die();
				//$this->load->view("pdf/formatopdf",$data);
				$html = $this->load->view("pdf/formatopdf",$data,true);
				$this->pdf->createPDF($html,'Cotizacion',false);
            }            
        }
        else{
            echo "demasiados parametros";
        }

        
    }
    // public function generatePdf2($idcot, $aseguradoras){
    public function generatePdf2(){
		// $aseguradoras = $this->clearstring->removeTags2($aseguradoras);

		$get = $this->input->post();
		$idcot= $this->clearstring->removeTags2($get["idcot"]);
		$aseguradoras= $this->clearstring->removeTags2($get["aseguradoras"]);
		$ts = $this->clearstring->removeTags2($get["tiposeguro"]);
		$tt = $this->clearstring->removeTags2($get["tipotarifa"]);
        $email = $this->clearstring->removeTags2($get["email"]);
        $nombre = $this->clearstring->removeTags2($get['Nombre']);
        $email = $this->clearstring->removeTags2($get['Email']);
        $nit = $this->clearstring->removeTags2($get['Nit']);
        $tel = $this->clearstring->removeTags2($get['Telefono']);

		$ts = explode("-",$ts);
		$tt = explode("-",$tt);
		$ase = explode("-",$aseguradoras);
		$ase2 ="";
		foreach($ase as $it){
			$ase2.=$it.",";
		}
		$ase2 = substr($ase2,0,-1);
        if(count($ase)<2){
            for($i = 0; $i<count($ase);$i++){
                $insert[$i]["cotizacion_id"] =$idcot;
                $insert[$i]["aseguradora_id"] =$ase[$i];
                $insert[$i]["tiposeguro_id"] =$ts[$i];
                $insert[$i]["tipotarifa_id"] =$tt[$i];
            }
			$id = $this->cam->insertCotAse($insert,$idcot);
			$prc = "CALL crear_ventas (".$idcot.",'$nombre','$email','$nit','$tel','')";
            $res1 = $this->con2->runQuery2("CALL crear_ventas (".$idcot.",'$nombre','$email','$nit','$tel','')");
			
            if(true == true){

				$values = array_values($insert);
				$data["size"] = sizeof($values);				
				$data['personal'] =$this->cam->getPersonal($idcot);
				$data["personal"][0]->idcot = $idcot;
				$data["personal"][0]->fecha = date('d/m/Y');
				$data["personal"][0]->telefono = "23278888";
				$data["personal"][0]->mail = "protegemosenlinea@protegemos.com.gt";
				$data['calculado'] = $this->cam->getDataPdf($idcot);
				$data['iab'] = $this->cam->getIAB($idcot);

				// $data["beneficios"][$title] = $temp[$title];
				$data["cob2"] = $this->con2->runQuery("CALL obtiene_cotizacion_seleccionada_cobertura($idcot)");
				// echo "<pre>";
				// print_r($data["calculado"]);
				// echo "</pre>";
				// die();
				$secciones= $this->con2->runQuery("CALL obtiene_cotizacion_seleccionada_seccionab($idcot)");
				$keys = $this->util->getKeys2($secciones,14);
				foreach($keys as $it){
					for($i=0; $i<count($secciones);$i++){
						if($secciones[$i][14]== $it){
							$data["secciones2"][$it][] = $secciones[$i];
						}
					}
					
				}
				$mailVentas = $this->cam->getConfig();
				$send1 = "$email,".$mailVentas[0]->valor;
				$html = $this->load->view("pdf/formatopdf",$data,true);
				$date = date("Ymdhis");
				$this->pdf->createPdf2($html,'Cotizacion'.$date,false);
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
                // $this->email->to($object[0]->email);
                // $this->email->to("irunga1@yahoo.com");
                $this->email->to($send1);
                $this->email->subject('Cotizador Auto Protegemos.');
                $this->email->message('
                    <p>Estimado  Sr. (a) '. $data["personal"][0]->nombre.':</p>
					<p>Reciba un cordial saludo de <strong>GRUPO PROTEGEMOS, S.A.</strong>, por medio de la presente le damos la más cordial bienvenida, agradeciendo la confianza depositada en nosotros para la contratación de su póliza de automóvil de '.$data["calculado"][0]->nombre.'.</p>
					<p>En breve uno de nuestros ejecutivos de servicio se estará contactando con usted para enviarle los requisitos para la emisión de su póliza</p>
					<p>Cualquier duda o información adicional puede comunicarse al siguiente número  telefónico: 2327-8888
						</p>
					<p style="text-align:center">	</p>
					<br><br>
					<p>Atentamente,</p>
					<p>GRUPO PROTEGEMOS ASESORES DE SEGUROS</p>
					'); 
				$this->email->attach( "public/pdf/Cotizacion".$date.".pdf");
                $this->email->send();        
                $urlpdf = base_url("public/pdf/Cotizacion".$date.".pdf");
                $data = array(
                    "esventa"=>1,
                    "pdfurl"=>$urlpdf,
				);
				$this->cam->updateCotizacion($data,$idcot);
                echo "enviado";
            }            
        }
        else{
			echo count($ase);
            echo "demasiados parametros";
        }

        
    }


    public function listing(){
        $data['view'] = "clientesauto/list";        
        $data['breadcrumb'] = "Inicio,Dashboard";
        $data['title'] = "Dashboard";
        $this->load->view("client", $data);
    }
    public function details($ids = ""){
        if($ids !=""){
            $ids = explode("-",$ids);
            echo "<pre>";
            print_r($ids);
            echo "</pre>";
        }
	}
	public function test(){
		$data["data"]= $this->cam->cualquiermierda();
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
    function alpha_dash_space($str){
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}
	public function prueba(){
		//$data =$this->con2->runQuery("select * from marca_vehiculo");
		$sql = '...'; 
		// phpinfo();die();
		$msc = microtime(true); 
		$data1 = $this->con2->runQuery("CALL obtiene_cotizacion_seleccionada_seccionab(136)");
		$msc = microtime(true)-$msc ; 


		echo "<pre>";
		print_r($msc);

	}
}


?>
