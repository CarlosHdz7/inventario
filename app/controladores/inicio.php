<?php session_start();
    class Inicio extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
            $this->cliente = $this->modelo('Cliente');
        }

        public function index(){
            $clientes = $this->cliente->total_clientes();
            $datos= [
                'clientes' => $clientes['total']
            ];
            $this->vista('app/header');
            $this->vista('app/inicio',$datos);
            $this->vista('app/footer');
        }

        public function cerrar_sesion(){
            session_destroy();
            $_SESSION = array();
            redireccionar('/paginaweb');
        }
    }
