<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RespuestasModel extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function guardarRespuesta($datosRta){
        $this->db->insert('TBL_Respuesta', $datosRta);
    }

    public function obtenerRespuestas(){
        return $this->db->get('TBL_Respuesta');
    }
}
