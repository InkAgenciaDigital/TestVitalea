<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PreguntaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PreguntasModel');
        $this->load->model('UsuariosModel');
        $this->load->model('TotalModel');
        $this->load->model('RespuestasModel');
    }
    public function index()
    {
        $data['pregunta'] = $this->PreguntasModel->obtenerPreguntas();
        $this->load->view('header');
        $this->load->view('pregunta/pregunta', $data);
        $this->load->view('footer');
    }

    public function responder()
    {
        $correoUsuario = $this->input->post('USR_Correo_Usuario');
        $nombreUsuario = "";
        for ($i = 0; $i < strlen($correoUsuario); $i++){
            if($correoUsuario[$i] == "@"){
                break;
            }
            $nombreUsuario = $nombreUsuario.$correoUsuario[$i];
        }
        $datos = [
            'USR_Nombres_Usuario' => $this->input->post('USR_Nombres_Usuario'),
            'USR_Correo_Usuario' => $correoUsuario,
            'USR_Telefono_Usuario' => $this->input->post('USR_Telefono_Usuario'),
            'USR_Nombre_Usuario' => $nombreUsuario,
            'USR_Clave_Usuario' => $this->encryption->encrypt($nombreUsuario)
        ];
        $this->UsuariosModel->crearUsuario($datos);
        $idUsuario = $this->db->insert_id();
        $datos = $this->input->post();

        $i = 1;
        foreach ($datos as $key => $dato) {
            if(strlen($dato) <= 3){
                if($key == 'r'.$i){
                    if($i >= 1 && $i <= 5){
                        $idChequeo = 1;
                    }else if ($i >= 6 && $i <= 9){
                        $idChequeo = 2;
                    }else if($i >= 10 && $i <= 13){
                        $idChequeo = 3;
                    }
                    $datosRta = [
                        'TTL_Usuario_Id' => $idUsuario,
                        'TTL_Pregunta_Id' => $i,
                        'TTL_Respuesta_Id' => $dato,
                        'TTL_Resultado_Id' => $idChequeo
                    ];
                    $this->TotalModel->agregarTotal($datosRta);
                    $i = $i + 1;
                }
            }
        }
        redirect(base_url().'resultadoController/index/'.$idUsuario);
    }

    public function listar(){
        if(!$this->session->userdata('Login'))
            redirect(base_url()."loginController");
        
        $preguntas = $this->PreguntasModel->listaPreguntas();
        $datos = [
            'preguntas' => $preguntas
        ];
        $this->load->view('header');
        $this->load->view('pregunta/listar', $datos);
        $this->load->view('footer');
    }

    public function crear(){
        if(!$this->session->userdata('Login'))
            redirect(base_url()."loginController");
        
        $respuestas = $this->RespuestasModel->obtenerRespuestas();
        $datos = [
            'respuestas' => $respuestas
        ];
        $this->load->view('header');
        $this->load->view('pregunta/crear', $datos);
        $this->load->view('footer');
    }

    public function guardar(){
        $datos = $this->input->post();
        $this->PreguntasModel->guardarPregunta($datos);
        redirect(base_url().'preguntaController/listar');
    }
}
