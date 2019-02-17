<?php session_start();
    class Productos extends Controlador{

        public function __construct(){
            $this->producto  = $this->modelo('Producto');
            $this->usuario   = $this->modelo('Usuario');
            $this->categoria = $this->modelo('Categoria');
        }

        public function pagina($pagina = null){
            //variables
            $cantidad_paginas = 5;
            $desde;
            $total_paginas;
            $total_productos = $this->producto->total_productos();      
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
            $total_paginas = ceil( $total_productos['total'] / $cantidad_paginas );

            $productos = $this->producto->obtener_productos( $desde, $cantidad_paginas );
            $categorias = $this->categoria->obtener_categorias2();
            
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
                'productos'      => $productos,
                'total_paginas' => $total_paginas,
                'pagina'        => $pagina,
                'categorias'    => $categorias,
                'start'         => $start,
                'end'           => $end,
                'titulo'        => 'Productos'
            ];


            $this->vista('app/header',$datos);
            $this->vista('app/productos',$datos);
            $this->vista('app/footer');
        }

        public function agregar(){
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $producto    = filter_var(trim($_POST['producto']),FILTER_SANITIZE_SPECIAL_CHARS); 
                $descripcion = filter_var(trim($_POST['descripcion']),FILTER_SANITIZE_SPECIAL_CHARS);
                $cantidad    = filter_var(trim($_POST['cantidad']),FILTER_SANITIZE_SPECIAL_CHARS);
                $precio      = filter_var(trim($_POST['precio']),FILTER_SANITIZE_SPECIAL_CHARS);
                $categoria   = filter_var(trim($_POST['categoria']),FILTER_SANITIZE_SPECIAL_CHARS);
                $fecha_registro = date('Y-m-d');

                if($producto == "" || $descripcion == "" || $cantidad == "" || $precio =="" || $categoria == "" || $fecha_registro == ""){
                    die('Por favor llenar los campos');
                } else {
                    $usuario = $this->usuario->obtener_id( $_SESSION['usuario'] );
                    $id_usuario = $usuario['id'];

                    if($this->producto->agregar($id_usuario,$categoria,$producto,$descripcion,$cantidad,$precio,$fecha_registro)){
                        redireccionar('/productos/pagina/1');
                    } else {
                        die('No se pudo registrar cliente');
                    }

                }
            }
        }

        public function editar(){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id          = filter_var(trim($_POST['id']),'FILTER_SANITIZE_SPECIAL_CHARS');
                $producto    = filter_var(trim($_POST['producto']),'FILTER_SANITIZE_SPECIAL_CHARS'); 
                $descripcion = filter_var(trim($_POST['descripcion']),'FILTER_SANITIZE_SPECIAL_CHARS');
                $cantidad    = filter_var(trim($_POST['cantidad']),'FILTER_SANITIZE_SPECIAL_CHARS');
                $precio      = filter_var(trim($_POST['precio']),'FILTER_SANITIZE_SPECIAL_CHARS');
                $categoria   = filter_var(trim($_POST['categoria']),'FILTER_SANITIZE_SPECIAL_CHARS');
                $fecha_registro = date('Y-m-d');

                if($id == "" || $producto == "" || $descripcion == "" || $cantidad == "" || $precio =="" || $categoria == "" || $fecha_registro == ""){
                    die('Por favor llenar los campos');
                } else {
                    if($this->producto->editar($id,$producto,$descripcion,$cantidad,$precio,$categoria,$fecha_registro)){
                        redireccionar('/productos/pagina/1');
                    } else {
                        die('No se pudo editar producto');
                    }

                }
            }
        }

        public function borrar($id){
            if($this->producto->borrar($id)){
                redireccionar('/productos/pagina/1');
            } else {
                die('No se pudo borrar producto');
            }
        }

        public function obtener_productos_por_categoria($id_categoria){
            $producto =$this->producto->obtener_productos_por_categoria($id_categoria);
           // return json_encode($producto);
           echo json_encode($producto);
        }

        public function obtener_cantidad_producto($id_producto){
            $cantidad =$this->producto->obtener_cantidad_producto($id_producto);
           // return json_encode($producto);
           echo json_encode($cantidad);
        }

        public function vender_producto($id_producto, $cantidad){
            $respuesta = $this->producto->vender_producto($id_producto, $cantidad);
            echo json_encode($respuesta);
        }

        public function generar_factura($total_vendido, $cliente, $productos_vendidos){
            
            $usuario = $this->usuario->obtener_id( $_SESSION['usuario'] );
            $id_usuario = $usuario['id'];
            $fecha_registro = date('Y-m-d');

            if($this->producto->generar_factura($id_usuario, $total_vendido, $cliente, $productos_vendidos, $fecha_registro)){
                $exito = "Factura generada correctamente";                
                echo json_encode($exito);
            } else {
                $error = "Error al generar factura";
                echo json_encode($error);
            }
        }
    }
