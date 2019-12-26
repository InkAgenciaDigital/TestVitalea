<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function login($nombreUsuario, $claveUsuario){
        $this->db->from('TBL_Usuario as u');
        $this->db->join('TBL_Usuario_Rol as ur', 'ur.USR_RL_Usuario_Id = u.USR_Id_Usuario');
        $this->db->join('TBL_Rol as r', 'r.RL_Id_Rol = ur.USR_RL_Rol_Id');
        $this->db->where('u.USR_Nombre_Usuario', $nombreUsuario);
        $this->db->where('u.USR_Clave_Usuario', $claveUsuario);
        $this->db->where('r.RL_Id_Rol', 1);
        $usuario = $this->db->get("TBL_Usuario");

        if($usuario->num_rows() > 0)
            return $usuario->row();
        else
            return false;
        
    }

    public function crearUsuario($datos){
        $this->db->insert('TBL_Usuario', $datos);
    }

    public function obtenerUsuarios($id = null){
        if($id === null){
            return $this->db->get('TBL_Usuario');
        }else{
            $this->db->select('u.*');
            $this->db->from('TBL_Usuario as u');
            $this->db->where('USR_Id_Usuario', $id);
            $query = $this->db->get();
            var_dump($query['USR_Nombres_Usuario']);
            return $this->db->where('USR_Id_Usuario', $id)->get('TBL_Usuario');
        }
    }
}
