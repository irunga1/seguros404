<?php

class Captcha {

    private $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    private $finalChar;
    public function generateString() {
        $size = rand(5, 6);
        // echo $size;
        $temp = "";
        for ($i = 0; $i < $size; $i++) {
            $temp.= $this->chars[rand(0, strlen($this->chars) - 1)];
        }
        $this->finalChar = $temp;
        return $this->finalChar;
    }
    public function generateImage($bu) {
        $im = imagecreatetruecolor(120, 40);
        $val = (string) $this->finalChar;
        // 229,176,41
        $text_color = imagecolorallocate($im, 51, 116, 255);
        $background = imagecolorallocate($im, 155,155,155);
		$name  = $this->finalChar."--.png";
		$color= imagecolorallocate($im, 204,204,204);
		imagefill($im,20,20,$color);
        imagestring($im, 15, 15, 15, $val, $text_color);
        imagepng($im, 'public/img/captcha/'.$name, 5);
        imagedestroy($im);
        echo "<img id='captcha' src='".$bu."public/img/captcha/$name'>";
    }

}

/* way to use */
/* $obj = new Captcha();
  $obj->generateString();
  $obj->generateImage();
  echo "<img src='captcha.jpg'>"; */
?>




