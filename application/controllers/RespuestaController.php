<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RespuestaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RespuestasModel');
    }

	public function index()
	{
        $this->load->view('header');
        $this->load->view('inicio/inicio');
        $this->load->view('footer');
    }

    public function listar(){
        if(!$this->session->userdata('Login'))
            redirect(base_url()."loginController");
        
        $respuestas = $this->RespuestasModel->obtenerRespuestas();
        $datos = [
            'respuestas' => $respuestas
        ];
        $this->load->view('header');
        $this->load->view('respuesta/listar', $datos);
        $this->load->view('footer');
    }

    public function crear(){
        if(!$this->session->userdata('Login'))
            redirect(base_url()."loginController");
        
        $this->load->view('header');
        $this->load->view('respuesta/crear');
        $this->load->view('footer');
    }

    public function guardar(){
        $datos = $this->input->post();
        $this->RespuestasModel->guardarRespuesta($datos);
        redirect(base_url().'respuestaController/listar');
    }
}
