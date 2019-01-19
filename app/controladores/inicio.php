<?php session_start();
    class Inicio extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){

            $this->vista('app/header');
            $this->vista('app/inicio');
            $this->vista('app/footer');
        }

        public function cerrar_sesion(){
            session_destroy();
            $_SESSION = array();
            redireccionar('/paginaweb');
        }
    }
