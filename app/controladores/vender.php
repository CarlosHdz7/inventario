<?php session_start();
    class Vender extends Controlador{

        public function __construct(){
            $this->cliente   = $this->modelo('Cliente');
            $this->categoria = $this->modelo('Categoria');
            $this->producto  = $this->modelo('Producto');
        }

        public function index(){

            $clientes = $this->cliente->obtener_clientes2();
            $categorias = $this->categoria->obtener_categorias2();

            $datos = [
                'clientes'   => $clientes,
                'categorias' => $categorias,
                'titulo'     => 'Vender'
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/vender',$datos);
            $this->vista('app/footer');
        }
    }
