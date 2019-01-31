<?php
    class Vender extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){
            $datos= [
                'titulo'        => 'Vender'
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/vender');
            $this->vista('app/footer');
        }
    }
