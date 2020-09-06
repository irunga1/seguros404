<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ClearString {
    private $stringItem;
    private $arrChar;

    public function __construct() {
        //$this->arrChar = array('(', ')', '\'', "´", '<', '>', '"', '[', ']', '{', '}',  " \"","select","SELECT","WHERE","where","Select","Where");
        $this->arrChar = array( '\'', "´", '<', '>', '"', '[', ']', '{', '}',  " \"","select","SELECT","WHERE","where","Select","Where");
    }
    
    public function getValue($a) {
        $this->stringItem = trim($a);
        $this->removeTags();
        $this->stringItem = filter_var($this->stringItem, FILTER_SANITIZE_STRING);
        return $this->stringItem;
    }

    private function removeTags() {
        for($i=0;$i<count($this->arrChar);$i++){
            foreach ($this->arrChar as $item) {                
                $this->stringItem = str_replace($item, '', $this->stringItem);
            }
            $this->stringItem = trim($this->stringItem);
        }
    }

    public function removeTags2($a) {
        $this->stringItem = $a;
        for($i=0;$i<count($this->arrChar);$i++){
            foreach ($this->arrChar as $item) {     
                // echo $item."  0000   ".$this->stringItem[$i]."<br>";           
                $this->stringItem = str_replace($item, '', $this->stringItem);
            }
            $this->stringItem = trim($this->stringItem);
        }
        return $this->stringItem;
    }


    
    public function __destruct() {
        $this->stringItem = null;
        $this->arrChar = null;
    }

}