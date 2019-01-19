<?php
    class Articulos extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){
            $this->vista('app/header');
            $this->vista('app/articulos');
            $this->vista('app/footer');
        }
    }
