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
                 
                $nombre   = trim($_POST['nombre']);
                $apellido = trim($_POST['apellido']);
                $usuario  = trim($_POST['usuario']);
                $email    = trim($_POST['email']);
                $password = trim($_POST['pass']);
                
                if($nombre == "" || $apellido == "" || $usuario == "" || $email == "" || $password == ""){
                    $datos = [
                        'error' => "Debe llenar todos los campos"
                    ];

                    $this->vista('paginaweb/header');
                    $this->vista('paginaweb/registrar',$datos);
                    $this->vista('paginaweb/footer');

                } else {
                    $usuarioDB = $this->usuario->verificar_usuario($usuario);
                    if($usuarioDB['usuario'] != $usuario){
                        
                        $password = encriptar($password);
                        if($this->usuario->registrar_usuarios($nombre,$apellido,$usuario,$email,$password)){
                            $datos = [
                                "exito" => "Usuario registrado con exito!"
                            ];
                            
                            $this->vista('paginaweb/header');
                            $this->vista('paginaweb/entrar',$datos);
                            $this->vista('paginaweb/footer');
                        } else {
                            header('Location:'.RUTA_URL.'/paginaweb/registrar');
                        }
                    } else {
                        $datos = [
                            "error" => "Este usuario ya existe!"
                        ];
                        
                        $this->vista('paginaweb/header');
                        $this->vista('paginaweb/registrar',$datos);
                        $this->vista('paginaweb/footer');
                    }
                }
            } 
        }

    }//fin de la clase
