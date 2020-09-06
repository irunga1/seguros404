<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TokenGenerator{
	private $tokenObject;
	private $finalString;
	public function __construct(){

	}
	public function generateToken (){
		$date = date('y-m-d,h:m.s'.rand(1,9999));
		$this->finalString = md5($date);		
		return $this->finalString;
	}

} 
?>