<?php session_start();
    class Perfil extends Controlador{

        public function __construct(){
            $this->usuario = $this->modelo('Usuario');
        }

        
        public function index(){
            $user = $_SESSION['usuario'];
            $info = $this->usuario->verificar_usuario($user);

            $datos = [
                'info'    => $info,
                'titulo'  => 'Perfil'
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/perfil',$datos);
            $this->vista('app/footer');
        }
    }
