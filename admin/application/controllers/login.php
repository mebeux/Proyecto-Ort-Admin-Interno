<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        
        $this->load->view("login/index");
    }

    public function validar() {


        $this->form_validation->set_rules("usuario", "Usuario", "trim|required");
        $this->form_validation->set_rules("clave", "Clave", "trim|required");
        //$this->form_validation->set_rules("usarioClave", "Usuario y Clave", "callback_validar_usuario");


        if ($this->form_validation->run() == false) {
            $this->index();
        } else {

            if ($this->validar_usuario()) {

                $datos_sesion = array("usuario" => $this->input->post("usuario"),
                    "logueado" => true);

                $this->session->set_userdata($datos_sesion);
                redirect("plan/index");
            } else {
                $this->load->view("login/index", array("mensaje" => "Usuario o contraseña inválidos"));
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("login/index");
    }
    
    private function validar_usuario() {

        $this->load->model("administrador_m");
        return $this->administrador_m->validarUsuario($this->input->post("usuario"), $this->input->post("clave"));
    }

}
