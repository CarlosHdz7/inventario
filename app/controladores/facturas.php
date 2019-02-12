<?php
    class Facturas extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){
            $datos = [
                'titulo' => "Facturas"
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/facturas');
            $this->vista('app/footer');
        }
    }
