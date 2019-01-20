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
                $cliente    = $_POST['cliente']; 
                $email      = $_POST['email'];
                $direccion  = $_POST['direccion'];
                $telefono   = $_POST['telefono'];

                if($cliente == "" || $email == "" || $direccion == "" || $telefono ==""){

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
            
        }

        public function borrar($id){
            if($this->cliente->borrar($id)){
                redireccionar('/clientes');
            } else {
                die('No se pudo borrar cliente');
            }
        }
    }