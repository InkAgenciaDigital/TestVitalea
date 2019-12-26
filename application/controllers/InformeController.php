<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('Login'))
            redirect(base_url()."loginController");
    }

	public function index()
	{
        $this->load->view('header');
        $this->load->view('informe/informe');
        $this->load->view('footer');
    }

    public function dataRespuesta(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $this->db->select("t.TTL_Id_Total, u.USR_Nombres_Usuario, p.PRG_Nombre_Pregunta, r.RST_Nombre_Resultado")
            ->from("TBL_Total as t")
            ->join("TBL_Usuario as u","u.USR_Id_Usuario = t.TTL_Usuario_Id")
            ->join("TBL_Pregunta as p","p.PRG_Id_Pregunta = t.TTL_Pregunta_Id")
            ->join("TBL_Resultado as r","r.RST_Id_Resultado = t.TTL_Resultado_Id");
        $query=$this->db->get();
  
        $data = [];
  
        foreach($query->result() as $r) {
            $data[] = array(
				$r->TTL_Id_Total,
                $r->USR_Nombres_Usuario,
                $r->PRG_Nombre_Pregunta,
                $r->RST_Nombre_Resultado   
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
    }
}
