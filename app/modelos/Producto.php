<?php
    class Producto{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function obtener_productos( $desde, $cantidad_paginas ){
            $this->db->query('SELECT p.id, c.categoria, p.producto, p.descripcion, p.cantidad,p.precio FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id ORDER BY id DESC LIMIT :desde, :cantidad_paginas');
            $this->db->bind(':desde',$desde);
            $this->db->bind(':cantidad_paginas',$cantidad_paginas);

            return $this->db->obtenerRegistros();
        }

        public function agregar($id_usuario,$categoria,$producto,$descripcion,$cantidad,$precio,$fecha_registro){
            
            $this->db->query("INSERT INTO productos (id,id_usuario,id_categoria,producto,descripcion,cantidad,precio,fecha_registro) VALUES 
            (null,:id_usuario,:id_categoria,:producto,:descripcion,:cantidad,:precio,:fecha_registro)");
            
            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':id_categoria',$categoria);
            $this->db->bind(':producto',$producto);
            $this->db->bind(':descripcion',$descripcion);
            $this->db->bind(':cantidad',$cantidad);
            $this->db->bind(':precio',$precio);
            $this->db->bind(':fecha_registro',$fecha_registro);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        
        public function total_productos(){
            $this->db->query('SELECT count(*) as total FROM productos');
            return $this->db->obtenerRegistro();
        }
    }