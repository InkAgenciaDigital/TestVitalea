<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreguntasModel extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function obtenerPreguntas(){
        $this->db->select("p.*, a.RTA_Id_Respuesta AS 'idrtaa', b.RTA_Id_Respuesta AS 'idrtab', a.RTA_Nombre_Respuesta AS 'nrtaa', b.RTA_Nombre_Respuesta AS 'nrtab'");
        $this->db->from('TBL_Pregunta as p'); 
        $this->db->join('TBL_Respuesta as a', 'a.RTA_Id_Respuesta = p.PRG_Respuesta_A_Id');
        $this->db->join('TBL_Respuesta as b', 'b.RTA_Id_Respuesta = p.PRG_Respuesta_B_Id');
        $query = $this->db->get();
        if($query->num_rows() > 0) return $query;
        else return false;
    }

    public function listaPreguntas(){
        $this->db->select("p.PRG_Nombre_Pregunta, a.RTA_Nombre_Respuesta AS 'nrtaa', b.RTA_Nombre_Respuesta AS 'nrtab'");
        $this->db->from('TBL_Pregunta as p'); 
        $this->db->join('TBL_Respuesta as a', 'a.RTA_Id_Respuesta = p.PRG_Respuesta_A_Id');
        $this->db->join('TBL_Respuesta as b', 'b.RTA_Id_Respuesta = p.PRG_Respuesta_B_Id');
        $query = $this->db->get();
        return $query;
    }

    public function guardarPregunta($datos){
        $this->db->insert('TBL_Pregunta', $datos);
    }
}
