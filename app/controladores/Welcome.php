<?php
    class Welcome extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){
            $datos = [
                'titulo' => "Framework MVC"
            ];
            $this->vista('home',$datos);
        }
    }
