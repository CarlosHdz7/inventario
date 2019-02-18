<?php session_start();
    class Perfil extends Controlador{

        public function __construct(){

        }

        
        public function index(){
            $datos = [
                'usuario'    => $_SESSION['usuario'],
                'titulo'     => 'Perfil'
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/perfil',$datos);
            $this->vista('app/footer');
        }
    }
