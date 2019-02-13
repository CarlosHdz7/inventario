<?php session_start();
    class Inicio extends Controlador{

        public function __construct(){
            $this->cliente   = $this->modelo('Cliente');
            $this->categoria = $this->modelo('Categoria');
            $this->producto  = $this->modelo('Producto');
            $this->factura  = $this->modelo('Factura');
        }

        public function index(){
            $clientes   = $this->cliente->total_clientes();
            $categorias = $this->categoria->total_categorias();
            $productos  = $this->producto->total_productos();
            $ventas     = $this->factura->obtener_ventas_totales();

            $datos= [
                'clientes'   => $clientes['total'],
                'categorias' => $categorias['total'],
                'productos'  => $productos['total'],
                'ventas'     => $ventas['total'],
                'titulo'     => 'Inicio'
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/inicio',$datos);
            $this->vista('app/footer');
        }

        public function cerrar_sesion(){
            session_destroy();
            $_SESSION = array();
            redireccionar('/paginaweb');
        }
    }
