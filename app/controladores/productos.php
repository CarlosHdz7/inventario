<?php
    class Productos extends Controlador{

        public function __construct(){
            $this->producto  = $this->modelo('Producto');
            $this->usuario   = $this->modelo('Usuario');
            $this->categoria = $this->modelo('Categoria');
        }

        public function pagina($pagina = null){
            //variables
            $total_registros;
            $cantidad_paginas = 5;
            $desde;
            $total_paginas;


            $total_productos = $this->producto->total_productos();      

            if($pagina == null or $pagina == 0){
                $pagina = 1;
            } else {
                $numero_pagina = $pagina;
            }

            $desde = ( $pagina - 1 ) * $cantidad_paginas;
            $total_paginas = ceil( $total_productos['total'] / $cantidad_paginas );

            $productos = $this->producto->obtener_productos( $desde, $cantidad_paginas );
            $categorias = $this->categoria->obtener_categorias2();
            
            $datos= [
                'productos'      => $productos,
                'total_paginas' => $total_paginas,
                'pagina'        => $pagina,
                'categorias'    => $categorias,
                'titulo'        => 'Productos'
            ];


            $this->vista('app/header',$datos);
            $this->vista('app/productos',$datos);
            $this->vista('app/footer');
        }

        public function agregar(){
           
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $producto    = trim($_POST['producto']); 
                $descripcion = trim($_POST['descripcion']);
                $cantidad    = trim($_POST['cantidad']);
                $precio      = trim($_POST['precio']);
                $categoria      = trim($_POST['categoria']);
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
                $id         = trim($_POST['id']);
                $producto    = trim($_POST['producto']); 
                $descripcion = trim($_POST['descripcion']);
                $cantidad    = trim($_POST['cantidad']);
                $precio      = trim($_POST['precio']);
                $categoria      = trim($_POST['categoria']);
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
    }
