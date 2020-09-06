<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Debug {
    private $error;
    private $arrayError;
    public function __construct() {
        
    }
    public function sD($data, $die = null) {
        echo "<pre>";
        print_r($data);
        echo"</pre>";
        if ($die != null) {
            die("debug ends here");
        }
    }
    public function aD($arrayData, $die = null) {
        foreach ($arrayData as $item) {
            echo "<pre>";
            print_r($item);
            echo"</pre>";
        }
        if ($die != null) {
            die("debug ends here");
        }
    }
}

/*
  way to use
  $a = "hello ";
  $b = "god bye";
  $c = "hi";
  $d = "how are you";
  $test12 = compact('a','b','c','d');
  $this->debug->arrayData($test12);
  $this->debug->arrayData($test12,true); si desea que el programa se detenga alli
 */
?>
