<?php 
class Mailsender {
    private $arrayData = array();
    private $headers;
    private $host;
    private $user;
    private $password;
    public function __construct(){
        
    }
    public function sendEmail($array){
		$this->arrayData=$array;
        $this->headers = "From: resetpassword@protegemos.com"; 
        $this->headers.= "Reply-To:". $this->arrayData['asunto'];
        $email_body = "\n Nombre: ". $this->arrayData['nombre'] ." \n Correo: " . $this->arrayData['correo']. " \n Telefono: ".  $this->arrayData['telefono']."\n Mensaje: " .$this->arrayData['mensaje'];
		//echo $email_body;
        //echo "<br />jirungaray@redpronet<=>enviando mail... <br />";
        mail("pabloirungaray@gmail.com",$this->arrayData['asunto'],$email_body);
		//mail()
	
        return true;
    }
	public function resetPassword($params){
		$this->arrayData=$params;
		$this->headers ='MIME-Version: 1.0' . "\r\n";
		$this->headers ='Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$this->headers .= "From: resetpassword@protegemos.com"; 		

		$email_body= 		
		"\n [esp] Copie el siguiente codigo:\n ".$this->arrayData["token"]." \n y porfavor siga el siguiente link para reiniciar su contraseña \n".$this->arrayData['link']."\n".
		"\n [eng] Copy and paste the following code: ".$this->arrayData["token"]." \n and please follow the following link to reset your password \n".$this->arrayData['link']."\n";
		//echo $email_body;
		//echo "<br />".$this->arrayData['correo']."<=>enviando mail...<br />";
		mail($this->arrayData['correo'],$this->arrayData['asunto'],$email_body,$this->headers);
		return true;
	}
	public function validateMail($params){
		$this->arrayData=$params;
		$this->headers = "From: resetpassword@protegemos.com"; 		
		$email_body= 		
		"\n [esp] Copie el siguiente codigo:\n ".$this->arrayData["token"]." \n y porfavor siga el siguiente link para validar su correo \n".$this->arrayData['link']."\n".
		"\n [eng] Copy and paste the following code: ".$this->arrayData["token"]." \n and please follow the following link to validate your password \n".$this->arrayData['link']."\n";
		//echo $email_body;
		//echo "<br />".$this->arrayData['correo']."<=>enviando mail...<br />";
		mail($this->arrayData['correo'],$this->arrayData['asunto'],$email_body,$this->headers);
		return true;
	}
}


/* 
way to use
$data['name']="Juan Pablo Irungaray";
$data['email']="pabloirungaray@gmail.com";
$data['phone']="50242142727";
$data['message']="Holi esto es un mensaje";
$obj = new Mailsender($data); */
?>

