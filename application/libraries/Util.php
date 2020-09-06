<?php 

    class Util{
        private $menu;
        public function __construct(){
            
        }
		public function getKeys($array, $key){
			$nArr = (array)$array;
			$tmpAr=[];
			for($i=0;$i < count($nArr);$i++){
				$temp = (array)$nArr[$i];
				$tmpAr[$i]= $temp[$key];
			}
			$tmpAr= array_unique($tmpAr);
			$tmpAr= array_values($tmpAr);
			return($tmpAr);
		}
		public function getKeys2($array, $pos){
			$nArr = (array)$array;
			$tmpAr=[];
			for($i=0;$i < count($nArr);$i++){
				$tmpAr[$i]= $array[$i][$pos];
			}
			$tmpAr= array_unique($tmpAr);
			$tmpAr= array_values($tmpAr);
			return($tmpAr);
		}

    }
?>
