<?php session_start();
    class Clientes extends Controlador{

        public function __construct(){
            $this->cliente = $this->modelo('Cliente');
            $this->usuario = $this->modelo('Usuario');
        }

        public function index(){
            $clientes = $this->cliente->obtener();
            $datos= [
                'clientes' => $clientes
            ];

            $this->vista('app/header');
            $this->vista('app/clientes',$datos);
            $this->vista('app/footer');
        }

        public function agregar(){
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $cliente    = trim($_POST['cliente']); 
                $email      = trim($_POST['email']);
                $direccion  = trim($_POST['direccion']);
                $telefono   = trim($_POST['telefono']);

                if($cliente == "" || $email == "" || $direccion == "" || $telefono ==""){
                    die('Por favor llenar los campos');
                } else {
                    $usuario = $this->usuario->obtener_id( $_SESSION['usuario'] );
                    $id_usuario = $usuario['id'];

                    if($this->cliente->agregar($id_usuario,$cliente,$direccion,$email,$telefono)){
                        redireccionar('/clientes');
                    } else {
                        die('No se pudo registrar cliente');
                    }

                }
            }
        }

        public function editar(){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $cliente    = trim($_POST['cliente']); 
                $email      = trim($_POST['email']);
                $direccion  = trim($_POST['direccion']);
                $telefono   = trim($_POST['telefono']);
                $id         = trim($_POST['id']);

                if($cliente == "" || $email == "" || $direccion == "" || $telefono == "" || $id == ""){
                    die('Por favor llenar los campos');
                } else {
                    if($this->cliente->editar($cliente,$direccion,$email,$telefono,$id)){
                        redireccionar('/clientes');
                    } else {
                        die('No se pudo editar cliente');
                    }

                }
            }
        }

        public function borrar($id){
            if($this->cliente->borrar($id)){
                redireccionar('/clientes');
            } else {
                die('No se pudo borrar cliente');
            }
        }
    }
