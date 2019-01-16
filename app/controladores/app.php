<?php
    class App extends Controlador{

        public function __construct(){
            $this->exampleModel = $this->modelo('Example');
        }

        public function index(){

            $this->vista('app/inicio');
        }
    }
