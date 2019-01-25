<?php
    class Categoria{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }
    
        public function obtener_categorias( $desde, $cantidad_paginas ){
            $this->db->query('SELECT * FROM categorias ORDER BY id DESC LIMIT :desde, :cantidad_paginas');
            $this->db->bind(':desde',$desde);
            $this->db->bind(':cantidad_paginas',$cantidad_paginas);

            return $this->db->obtenerRegistros();
        }

        public function agregar($id_usuario,$categoria,$fecha_registro){
            
            $this->db->query("INSERT INTO categorias (id,id_usuario,categoria,fecha_registro) VALUES (null,:id_usuario,:categoria,:fecha_registro)");
            
            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':categoria',$categoria);
            $this->db->bind(':fecha_registro',$fecha_registro);


            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function editar($categoria,$fecha_registro,$id){
            $this->db->query("UPDATE categorias SET categoria=:categoria,fecha_registro=:fecha_registro WHERE id=:id");
            
            $this->db->bind(':categoria',$categoria);
            $this->db->bind(':fecha_registro',$fecha_registro);
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function borrar($id){
            $this->db->query('DELETE FROM categorias  WHERE id = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function total_categorias(){
            $this->db->query('SELECT count(*) as total FROM categorias');
            return $this->db->obtenerRegistro();
        }
    }