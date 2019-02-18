<?php session_start();
class Paginaweb extends Controlador{

    public function __construct(){
        $this->usuario = $this->modelo('Usuario');
    }

    public function index(){
        
        if(isset($_SESSION['usuario'])){
            redireccionar('/inicio');
        } else {
            $this->vista('paginaweb/header');
            $this->vista('paginaweb/inicio');
            $this->vista('paginaweb/footer');
        }
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
                
            $nombre   = filter_var(trim($_POST['nombre']),FILTER_SANITIZE_SPECIAL_CHARS);
            $apellido = filter_var(trim($_POST['apellido']),FILTER_SANITIZE_SPECIAL_CHARS);
            $usuario  = filter_var(trim($_POST['usuario']),FILTER_SANITIZE_SPECIAL_CHARS);
            $email    = filter_var(trim($_POST['email']),FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_var(trim($_POST['pass']),FILTER_SANITIZE_SPECIAL_CHARS);
            $id_rol   = 2;
            $fecha_registro = date('Y-m-d');
            
            if($nombre == "" || $apellido == "" || $usuario == "" || $email == "" || $password == "" || $fecha_registro == ""){
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
                    if($this->usuario->registrar_usuarios($id_rol,$nombre,$apellido,$usuario,$email,$password,$fecha_registro)){
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

    public function login_usuario(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $usuario  = $_POST['usuario'];
            $password = $_POST['pass'];

            $datos = $this->usuario->verificar_usuario($usuario);

            if(verificar_hash($password, $datos['pass'])){
                $_SESSION['usuario'] = $datos['usuario'];
                redireccionar('/paginaweb/');
            } else {
                die(var_dump($datos));
            }
        }
    }
}//fin de la clase