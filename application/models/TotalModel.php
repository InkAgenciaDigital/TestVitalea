<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TotalModel extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function agregarTotal($datosRta){
        $this->db->insert('TBL_Total', $datosRta);
    }

    public function obtenerTotales($id){
        $this->db->select("p.PRG_Nombre_Pregunta, ru.RTA_Nombre_Respuesta AS 'RTA_Sistema', rd.RTA_Nombre_Respuesta AS 'RTA_Usuario', res.*");
        $this->db->from('TBL_Total as t');
        $this->db->join('TBL_Pregunta as p', 't.TTL_Pregunta_Id = p.PRG_Id_Pregunta');
        $this->db->join('TBL_Respuesta as rd', 'rd.RTA_Id_Respuesta = t.TTL_Respuesta_Id');
        $this->db->join('TBL_Respuesta as ru', 'p.PRG_Respuesta_No_Favorable_Id = ru.RTA_Id_Respuesta');
        $this->db->join('TBL_Resultado as res', 'res.RST_Id_Resultado = t.TTL_Resultado_Id');
        $this->db->where('t.TTL_Usuario_Id', $id);
        $this->db->order_by('p.PRG_Id_Pregunta');
        $query = $this->db->get();
        if($query->num_rows() > 0) return $query;
        else return false;
    }
}
