<?php
    class Producto{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function obtener_productos( $desde, $cantidad_paginas ){
            $this->db->query('SELECT p.id, c.id as id_categoria, c.categoria, p.producto, p.descripcion, p.cantidad,p.precio FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id ORDER BY id DESC LIMIT :desde, :cantidad_paginas');
            $this->db->bind(':desde',$desde);
            $this->db->bind(':cantidad_paginas',$cantidad_paginas);

            return $this->db->obtenerRegistros();
        }

        public function obtener_productos_por_categoria($categoria){
            $this->db->query('SELECT * FROM productos WHERE id_categoria = :id_categoria');
            $this->db->bind(':id_categoria',$categoria);
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

        public function editar($id,$producto,$descripcion,$cantidad,$precio,$categoria,$fecha_registro){
            $this->db->query("UPDATE productos SET producto=:producto,descripcion=:descripcion, cantidad=:cantidad, precio=:precio, id_categoria=:categoria, fecha_registro=:fecha_registro WHERE id=:id");
            
            $this->db->bind(':id',$id);
            $this->db->bind(':producto',$producto);
            $this->db->bind(':descripcion',$descripcion);
            $this->db->bind(':cantidad',$cantidad);
            $this->db->bind(':precio',$precio);
            $this->db->bind(':categoria',$categoria);
            $this->db->bind(':fecha_registro',$fecha_registro);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function borrar($id){
            
            $this->db->query('DELETE FROM productos  WHERE id = :id');
            $this->db->bind(':id',$id);
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
        

        public function obtener_cantidad_producto($id_producto){
            $this->db->query('SELECT cantidad FROM productos WHERE id=:id_producto');
            $this->db->bind(':id_producto',$id_producto);
            return $this->db->obtenerRegistro();
        }

        public function vender_producto( $id_producto, $cantidad){
            $this->db->query('SELECT cantidad FROM productos WHERE id = :id_producto');
            $this->db->bind(':id_producto',$id_producto);
            $cantidad_actual = $this->db->obtenerRegistros();
            
            if($cantidad_actual[0]->cantidad < (int)$cantidad){
                return false;
            } else {
                $nueva_cantidad   = $cantidad_actual[0]->cantidad - (int)$cantidad;
                $this->db->query("UPDATE productos SET cantidad=:nueva_cantidad WHERE id=:id_producto");
                $this->db->bind(':id_producto',$id_producto);
                $this->db->bind(':nueva_cantidad',$nueva_cantidad);
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }

            }
        }

        public function generar_factura($id_usuario, $total_vendido, $cliente, $productos_vendidos, $fecha_registro){
            $this->db->query('INSERT INTO facturas (id,id_usuario,cliente,total_vendido,productos_vendidos,fecha_registro) VALUES (null,:id_usuario,:cliente,:total_vendido,:productos_vendidos,:fecha_registro)');
            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':cliente',$cliente);
            $this->db->bind(':total_vendido',$total_vendido);
            $this->db->bind(':productos_vendidos',$productos_vendidos);
            $this->db->bind(':fecha_registro',$fecha_registro);
 
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function productos_agotados(){
            $this->db->query('SELECT p.producto,c.categoria, p.cantidad FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE cantidad <= 10');
            return $this->db->obtenerRegistros();
        }
    }