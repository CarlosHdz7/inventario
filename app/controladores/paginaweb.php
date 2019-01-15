<?php
    class Paginaweb extends Controlador{

        public function __construct(){
            $this->usuario = $this->modelo('Usuario');
        }

        public function index(){
            $this->vista('paginaweb/header');
            $this->vista('paginaweb/inicio');
            $this->vista('paginaweb/footer');
        }

        public function registrar(){
            $this->vista('paginaweb/header');
            $this->vista('paginaweb/registrar');
            $this->vista('paginaweb/footer');
        }

        public function entrar(){
            $this->vista('paginaweb/header');
            $this->vista('paginaweb/entrar');
            $this->vista('paginaweb/footer');
        }

        public function registrar_usuario(){

            if($_SERVER['REQUEST_METHOD'] ==  "POST"){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $usuario = $_POST['usuario'];
                $email = $_POST['email'];
                $password = $_POST['pass'];
                
                if($this->usuario->registrar_usuarios($nombre,$apellido,$usuario,$email,$password)){
                    header('Location:'.RUTA_URL.'/paginaweb/entrar');
                } else {
                    header('Location:'.RUTA_URL.'/paginaweb/registrar');
                }
            } else {
                //algo
            }
        }
    }
