<?php 

    class Checksession{
        private $menu;
        public function __construct(){
            
        }
        public function getData($menu,$controller){
            $this->menu = $menu;
            foreach($this->menu as $it){
                $temp = explode("/",$it->url);
                if($temp[0] == $controller){
                    $existe = true;
                }
            }
            if($existe == false){
                redirect(base_url("dashboard/index"));
            }
        }

    }
?>
