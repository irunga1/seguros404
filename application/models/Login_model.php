<?php
class Login_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function login($usuario, $clave){
        $query ="
        select 
            u.usuario_id,u.nombreusuario,m.* 
        from 
            usuario u 
        join rol_usuario ru on ru.usuario_id = u.usuario_id 
        join rol_menu rm on ru.rol_id = rm.rol_id
        join menu m on m.menu_id = rm.menu_id
        where u.usuario = '$usuario' and u.clave='$clave';
        ";
        
        $data = $this->db->query($query);
        return $data->result_object();
    }
    public function recuperar($correo){
        $query = "select u.usuario_id,u.email from usuario u where email = '$correo'";
        $data = $this->db->query($query);
        return $data->result_object();
    }
    public function insertR($object){
        $this->db->insert("recuperar_clave",$object);
        return  true;
    }
    public function searchHash($hash){
        $this->db->select('correo');
        $this->db->from('recuperar_clave');
        $this->db->where('clave',$hash);
        $this->db->order_by('recuperarclave_id','DESC');
        $res = $this->db->get();
        $res = $res->result_object();
        if(isset($res[0])){
            return $res[0];
        }
        else{
            return false;
        }
        
        
    }
    public function changePass($clave, $correo){
        $data =array(
            "clave"=>md5($clave)
        );
        $this->db->where('email',$correo);
        $this->db->update('usuario',$data);
        return  true;

    }
}

?>