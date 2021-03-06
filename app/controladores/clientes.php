<?php session_start();
    class Clientes extends Controlador{

        public function __construct(){
            $this->cliente = $this->modelo('Cliente');
            $this->usuario = $this->modelo('Usuario');
        }

/*         public function index(){
            $clientes = $this->cliente->obtener();
            $datos= [
                'clientes' => $clientes
            ];

            $this->vista('app/header');
            $this->vista('app/clientes',$datos);
            $this->vista('app/footer');
        } */

        public function pagina($pagina = null){
            //variables para obtener las filas
            $cantidad_paginas = 5; //limit
            $desde;                //row_start 
            $total_paginas;        //last      
            $total_clientes = $this->cliente->total_clientes(); 
            $links = 2;     

            //variables para obtener la cantidad de links
            $start;
            $end;

            if($pagina == null or $pagina == 0){
                $pagina = 1;
            } else {
                $numero_pagina = $pagina;
            }

            $desde = ( $pagina - 1 ) * $cantidad_paginas;
            $total_paginas = ceil( $total_clientes['total'] / $cantidad_paginas );

            $clientes = $this->cliente->obtener_clientes( $desde, $cantidad_paginas );

            if( ($pagina - $links) > 0){
                $start = $pagina - $links;
            } else {
                $start = 1;
            }

            if( ($pagina + $links) < $total_paginas){
                $end = $pagina + $links;
            } else {
                $end = $total_paginas;
            }
            
            $datos= [
                'clientes'      => $clientes,
                'total_paginas' => $total_paginas,
                'pagina'        => $pagina,
                'start'         => $start,
                'end'           => $end,
                'titulo'        => 'Clientes'
            ];


            $this->vista('app/header',$datos);
            $this->vista('app/clientes',$datos);
            $this->vista('app/footer');
        }

        public function agregar(){
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $cliente    = filter_var(trim($_POST['cliente']),FILTER_SANITIZE_SPECIAL_CHARS); 
                $email      = filter_var(trim($_POST['email']),FILTER_SANITIZE_SPECIAL_CHARS);
                $direccion  = filter_var(trim($_POST['direccion']),FILTER_SANITIZE_SPECIAL_CHARS);
                $telefono   = filter_var(trim($_POST['telefono']),FILTER_SANITIZE_SPECIAL_CHARS);
                $fecha_registro = date('Y-m-d');

                if($cliente == "" || $email == "" || $direccion == "" || $telefono =="" || $fecha_registro == ""){
                    die('Por favor llenar los campos');
                } else {
                    $usuario = $this->usuario->obtener_id( $_SESSION['usuario'] );
                    $id_usuario = $usuario['id'];

                    if($this->cliente->agregar($id_usuario,$cliente,$direccion,$email,$telefono,$fecha_registro)){
                        redireccionar('/clientes/pagina/1');
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
                $fecha_registro = date('Y-m-d');

                if($cliente == "" || $email == "" || $direccion == "" || $telefono == "" || $id == "" || $fecha_registro == ""){
                    die('Por favor llenar los campos');
                } else {
                    if($this->cliente->editar($cliente,$direccion,$email,$telefono,$id,$fecha_registro)){
                        redireccionar('/clientes/pagina/1');
                    } else {
                        die('No se pudo editar cliente');
                    }

                }
            }
        }

        public function borrar($id){
            if($this->cliente->borrar($id)){
                redireccionar('/clientes/pagina/1');
            } else {
                die('No se pudo borrar cliente');
            }
        }
    }
