<?php session_start();
    class Categorias extends Controlador{

        public function __construct(){
            $this->usuario = $this->modelo('Usuario');
            $this->categoria = $this->modelo('Categoria');
        }

        public function index(){
            $this->vista('app/header');
            $this->vista('app/categorias');
            $this->vista('app/footer');
        }

        public function pagina($pagina = null){
            //variables
            $cantidad_paginas = 5;
            $desde;
            $total_paginas;
            $total_categorias = $this->categoria->total_categorias();      
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
            $total_paginas = ceil( $total_categorias['total'] / $cantidad_paginas );

            $categorias = $this->categoria->obtener_categorias( $desde, $cantidad_paginas );
            
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
                'categorias'    => $categorias,
                'total_paginas' => $total_paginas,
                'pagina'        => $pagina,
                'start'         => $start,
                'end'           => $end,
                'titulo'        => 'Categorias'
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/categorias',$datos);
            $this->vista('app/footer');
        }

        public function agregar(){
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $categoria   = filter_var(trim($_POST['categoria']),'FILTER_SANITIZE_SPECIAL_CHARS'); 

                if($categoria == ""){
                    die('Por favor llenar los campos');
                } else {
                    $usuario        = $this->usuario->obtener_id( $_SESSION['usuario'] );
                    $id_usuario     = $usuario['id'];
                    $fecha_registro = date('Y-m-d');

                    if($this->categoria->agregar($id_usuario,$categoria,$fecha_registro)){
                        redireccionar('/categorias/pagina/1');
                    } else {
                        die('No se pudo registrar cliente');
                    }

                }
            }
        }

        public function editar(){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $categoria       = trim($_POST['categoria']); 
                $fecha_registro  = date('Y-m-d');
                $id              = trim($_POST['id']);

                if($categoria == "" || $id == ""){
                    die('Por favor llenar los campos');
                } else {
                    if($this->categoria->editar($categoria,$fecha_registro,$id)){
                        redireccionar('/categorias/pagina/1');
                    } else {
                        die('No se pudo editar categoria');
                    }
                }
            }
        }

        
        public function borrar($id){
            if($this->categoria->borrar($id)){
                redireccionar('/categorias/pagina/1');
            } else {
                die('No se pudo borrar la categoria');
            }
        }
    }
