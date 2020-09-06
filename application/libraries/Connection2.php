<?php  //require_once("../config/constants.php");

class Conection2{    
    private $con;
    private $arrayCon;
    private $server;
    private $isConected;
    private $return1;

    public function __construct(){            
        $this->arrayCon['DATABASE']  = dbconfig["host"]; //
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
    public function runQuery($queryString){
        if($queryString !=""){
            if($this->isConected == true){
                $this->return1 = $temp = mysqli_query($this->conn,$queryString);
                // echo "return true";
                return $this->return1;
            }
            else{
                $this->return1 = array("error"=>"1","message"=>print_r( mysqli_error($this->conn)));
                // echo "return false";
                return $this->return1;
            }
        }
        else{
            $this->return1 = array("error"=>"1","message"=>print_r( mysqli_error($this->conn)));
            // echo "return false2";
            return $this->return1;
        }

    }
    public function close(){
        mysqli_close($this->conn);
    }
}

?>
