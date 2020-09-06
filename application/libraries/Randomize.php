<?php 
    class Randomize {
        private $string1 = "ABCDEFGHIJQLMNOPQRSTUVWXYZ";
        private $string2 = "0123456789";
        private $final = "";

        public function genWord(){
            for($i = 0; $i<3;$i++){
                $num = rand(0,25);
                $this->final .= $this->string1[$num];
            }
            for($i = 0; $i<3;$i++){
                $num = rand(0,9);
                $this->final .= $this->string2[$num];
            }
            return $this->final;
        }
    }
?>