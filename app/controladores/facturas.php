<?php
    class Facturas extends Controlador{

        public function __construct(){
            $this->factura = $this->modelo('Factura');
        }

        public function index(){
            $datos = [
                'titulo' => "Facturas"
            ];

            $this->vista('app/header',$datos);
            $this->vista('app/facturas');
            $this->vista('app/footer');
        }

        public function pagina($pagina = null){
            //variables
            $total_registros;
            $cantidad_paginas = 5;
            $desde;
            $total_paginas;


            $total_facturas = $this->factura->total_facturas();      

            if($pagina == null or $pagina == 0){
                $pagina = 1;
            } else {
                $numero_pagina = $pagina;
            }

            $desde = ( $pagina - 1 ) * $cantidad_paginas;
            $total_paginas = ceil( $total_facturas['total'] / $cantidad_paginas );

            $facturas = $this->factura->obtener_facturas( $desde, $cantidad_paginas );
            
            $datos= [
                'facturas'      => $facturas,
                'total_paginas' => $total_paginas,
                'pagina'        => $pagina,
                'titulo'        => 'Facturas'
            ];


            $this->vista('app/header',$datos);
            $this->vista('app/facturas',$datos);
            $this->vista('app/footer');
        }
    }
