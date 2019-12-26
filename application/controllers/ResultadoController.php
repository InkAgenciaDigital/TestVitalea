<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultadoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TotalModel');
    }

	public function index($id)
	{
        $resultado = $this->TotalModel->obtenerTotales($id);
        $cantidadNutricion = 0; $respuestaNutricion = 0; $porcentajeNutricion = 0;
        $cantidadVegetariano = 0; $respuestaVegetariano = 0; $porcentajeVegetariano = 0;
        $cantidadCeliaco = 0; $respuestaCeliaco = 0; $porcentajeCeliaco = 0;
        foreach ($resultado->result() as $key => $res) {
            if($res->RST_Id_Resultado == 1){
                $cantidadNutricion = $cantidadNutricion + 1;
                if($res->RTA_Sistema == $res->RTA_Usuario){
                    $respuestaNutricion = $respuestaNutricion + 1;
                }
            }
            else if($res->RST_Id_Resultado == 2){
                $cantidadVegetariano = $cantidadVegetariano + 1;
                if($res->RTA_Sistema == $res->RTA_Usuario){
                    $respuestaVegetariano = $respuestaVegetariano + 1;
                }
            }else if($res->RST_Id_Resultado == 3){
                $cantidadCeliaco = $cantidadCeliaco + 1;
                if($res->RTA_Sistema == $res->RTA_Usuario){
                    $respuestaCeliaco = $respuestaCeliaco + 1;
                }
            }
        }
        $porcentajeNutricion = ($respuestaNutricion / $cantidadNutricion)*100;
        $porcentajeVegetariano = ($respuestaVegetariano / $cantidadVegetariano)*100;
        $porcentajeCeliaco = ($respuestaCeliaco / $cantidadCeliaco)*100;
        if($porcentajeNutricion > 50){
            $recomendacionNutricional = 'Chequeo Nutricional';
            $recoN = 1;
        }else{
            $recomendacionNutricional = 'Chequeo Express';
            $recoN = 4;
        }
        if($porcentajeVegetariano > 50){
            $recomendacionVegetariano = 'Chequeo Vegetariano';
            $recoV = 2;
        }else{
            $recomendacionVegetariano = 'Chequeo Express';
            $recoV = 4;
        }
        if($porcentajeCeliaco > 50){
            $recomendacionCeliaco = 'Chequeo Celiaco';
            $recoC = 3;
        }else{
            $recomendacionCeliaco = 'Chequeo General';
            $recoC = 5;
        }
        if($porcentajeNutricion > $porcentajeVegetariano && $porcentajeNutricion > $porcentajeCeliaco)
            $recomendado = $recoN;
        else if($porcentajeVegetariano > $porcentajeNutricion && $porcentajeVegetariano > $porcentajeCeliaco)
            $recomendado = $recoV;
        else if($porcentajeCeliaco > $porcentajeNutricion && $porcentajeCeliaco > $porcentajeVegetariano)
            $recomendado = $recoC;
        $dato = ['TTL_Resultado_Recomendado_Id' => $recomendado];
        $this->TotalModel->actualizarTotal($id, $dato);
        $datos = [
            'porcentajeNutricion' => $porcentajeNutricion,
            'porcentajeCeliaco' => $porcentajeCeliaco,
            'porcentajeVegetariano' => $porcentajeVegetariano,
            'recomendacionNutricional' => $recomendacionNutricional,
            'recomendacionVegetariano' => $recomendacionVegetariano,
            'recomendacionCeliaco' => $recomendacionCeliaco
        ];
        $this->load->view('header');
        $this->load->view('pregunta/resultado', $datos);
        $this->load->view('footer');
    }
}
