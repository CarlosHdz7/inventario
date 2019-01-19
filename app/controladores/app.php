<?php session_start();
    class App extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){

            $this->vista('app/header');
            $this->vista('app/inicio');
            $this->vista('app/footer');
        }

        public function clientes(){
            
            $this->vista('app/header');
            $this->vista('app/clientes');
            $this->vista('app/footer');
        }

        public function vender(){
    
            $this->vista('app/header');
            $this->vista('app/vender');
            $this->vista('app/footer');
        }

        public function articulos(){
    
            $this->vista('app/header');
            $this->vista('app/articulos');
            $this->vista('app/footer');
        }

        public function categorias(){
    
            $this->vista('app/header');
            $this->vista('app/categorias');
            $this->vista('app/footer');
        }

        public function cerrar_sesion(){
            session_destroy();
            $_SESSION = array();
            redireccionar('/paginaweb');
        }
    }
