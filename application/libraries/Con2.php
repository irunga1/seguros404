<?php 
    class Con2{
        private $menu;
		private $con;
		private $arrayCon;
		private $server;
		private $isConected;
		private $return1;	
		public function __construct(){        
			//$this->server = 
			$this->arrayCon['DATABASE']  = dbconfig["host"];  //
			$this->arrayCon['UID']    = dbconfig["user"];
			$this->arrayCon['PWD']    =dbconfig["pass"];
			$this->conn = mysqli_connect($this->arrayCon["DATABASE"],$this->arrayCon["UID"],$this->arrayCon["PWD"],dbconfig["dbname"]);
			if( $this->conn ) {
				$this->isConected = true;
			}
			else{
			   $this->isConected = false;
		   }
		}
		public function reconect(){
			$this->isConected = true;
			$this->conn = mysqli_connect($this->arrayCon["DATABASE"],$this->arrayCon["UID"],$this->arrayCon["PWD"],'sincom_seguros');

		}
		public function runQuery($queryString){
			try {
				if($queryString !=""){
					if($this->isConected ==false){
						$this->reconect();
					}
					
					if($this->isConected == true){
						$data = mysqli_query($this->conn,$queryString);
						// echo "<pre>";
						// print_r($data);
						// echo "<pre>";

						$this->return1 = mysqli_fetch_all($data);
						$this->close();
						return $this->return1;
					}
					else{
						$this->return1 = array("error"=>"1","message"=>print_r( mysqli_error($this->conn)));
						return $this->return1;
					}
				}
				else{
					$this->return1 = array("error"=>"1","message"=>print_r( mysqli_error($this->conn)));
					return $this->return1;
				}
			} catch (\Exception $e) {
				$e->getMessage();
			}
		}
		public function runQuery2($queryString){
			try {
				if($queryString !=""){
					if($this->isConected ==false){
						$this->reconect();
					}
					
					if($this->isConected == true){
						$data = mysqli_query($this->conn,$queryString);
						// $this->return1 = mysqli_fetch_all($data);
						$this->close();
						return $this->return1;
					}
					else{
						$this->return1 = array("error"=>"1","message"=>print_r( mysqli_error($this->conn)));
						return $this->return1;
					}
				}
				else{
					$this->return1 = array("error"=>"1","message"=>print_r( mysqli_error($this->conn)));
					return $this->return1;
				}
			} catch (\Exception $e) {
				$e->getMessage();
			}
		}
		public function close(){
			$this->isConected = false;
			mysqli_close($this->conn);
		}
    }
?>
