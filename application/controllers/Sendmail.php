<?php 
    class Sendmail extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function sendMail(){
            try {
                //code...
            } catch (\Exception $e) {
                //throw $th;
            }
            $this->load->library("email");
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['smtp_user'] = "no-reply@sin404.com";
            $config['smtp_pass'] = 'Cremas2020$';
            $config['smtp_port'] = '290';
            $config['smtp_host'] = 'mail.sin404.com';
            $config['smtp_crypto'] = 'ssl';

            $this->email->from('irunga1@yahoo.com');
            $this->email->to('irunga1@yahoo.com');
            $this->email->subject('irunga1@yahoo.com');
            $this->email->message('prueba');
            if($this->email->send()){
                echo "se fue";
            }
            else{
                echo "no se fue";
            }
            

            
            
        }
    }
    
?>