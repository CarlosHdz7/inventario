<?php
    class Categorias extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){
            $this->vista('app/header');
            $this->vista('app/categorias');
            $this->vista('app/footer');
        }
    }
