<?php
    class Paginaweb extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
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
                $contraseña = $_POST['pass'];

                header('Location:'.RUTA_URL.'/paginaweb/entrar');
            } else {
                //algo
            }
        }
    }
