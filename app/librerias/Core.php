<?php
    class Core{
        protected $controladorDefault = 'welcome';
        protected $metodoDefault      = 'index';
        protected $parametrosDefault   = [];

        public function __construct() {
            $url = $this->obtenerUrl();

            /* OBTENER CONTROLADOR*/
            if(file_exists('../app/controladores/'.ucwords($url[0]).'.php')) {

                $this->controladorDefault = ucwords($url[0]); 
                unset($url[0]);
            }

            require_once '../app/controladores/'.$this->controladorDefault. '.php';
            $this->controladorDefault = new $this->controladorDefault;

            /* OBTENER METODO*/
            if(isset($url[1])){
                if(method_exists($this->controladorDefault, $url[1])){

                    $this->metodoDefault = $url[1];
                    unset($url[1]);
                }
            }

            /* OBTENER PARAMETROS*/
            $this->parametrosDefault = $url ? array_values($url) : [];
            call_user_func_array([$this->controladorDefault,$this->metodoDefault],$this->parametrosDefault);
        }
        
        public function obtenerUrl() {

            if(isset( $_GET['url']) ){
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                 return $url;
            }
        }
    }
