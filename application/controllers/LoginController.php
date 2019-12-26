<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UsuariosModel");
    }

	public function index()
	{
        if($this->session->userdata('Login'))
            redirect(base_url()."informeController");
        else{
            $this->load->view('header');
            $this->load->view('login/login');
            $this->load->view('footer');
        }
    }
    
    public function login(){
        $nombreUsuario = $this->input->post('USR_Nombre_Usuario');
        $claveUsuario = $this->input->post('USR_Clave_Usuario');
        $usuario = $this->UsuariosModel->login($nombreUsuario, $claveUsuario);
        if(!$usuario){
            redirect(base_url()."loginController");
        }else{
            $datosUsuario = array(
                'USR_Id_Usuario' => $usuario->USR_Id_Usuario,
                'USR_Nombre_Usuario' => $usuario->USR_Nombre_Usuario,
                'USR_Correo_Usuario' => $usuario->USR_Correo_Usuario,
                'Login' => TRUE
            );
            $this->session->set_userdata($datosUsuario);
            redirect(base_url()."informeController");
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url()."loginController");
    }
}
