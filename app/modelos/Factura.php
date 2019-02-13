<?php
    class Factura{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function total_facturas(){
            $this->db->query('SELECT count(*) as total FROM facturas');
            return $this->db->obtenerRegistro();
        }

        public function obtener_facturas( $desde, $cantidad_paginas ){
            $this->db->query('SELECT * FROM facturas ORDER BY id DESC LIMIT :desde, :cantidad_paginas');
            $this->db->bind(':desde',$desde);
            $this->db->bind(':cantidad_paginas',$cantidad_paginas);

            return $this->db->obtenerRegistros();
        }

        public function obtener_ventas_totales(){
            $this->db->query('SELECT SUM(total_vendido) AS total FROM facturas');
            return $this->db->obtenerRegistro();
        }

    }