<?php
    class Cliente{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

/*         public function obtener(){
            $this->db->query('SELECT * FROM clientes');
            return $this->db->obtenerRegistros();
        } */

        public function obtener_clientes( $desde, $cantidad_paginas ){
            $this->db->query('SELECT * FROM clientes ORDER BY id DESC LIMIT :desde, :cantidad_paginas');
            $this->db->bind(':desde',$desde);
            $this->db->bind(':cantidad_paginas',$cantidad_paginas);

            return $this->db->obtenerRegistros();
        }

        public function obtener_clientes2(){
            $this->db->query('SELECT * FROM clientes');
            return $this->db->obtenerRegistros();
        }

        public function agregar($id_usuario,$cliente,$direccion,$email,$telefono, $fecha_registro){
            
            $this->db->query("INSERT INTO clientes (id,id_usuario,cliente,direccion,email,telefono,fecha_registro) VALUES (null,:id_usuario,:cliente,:direccion,:email,:telefono,:fecha_registro)");
            
            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':cliente',$cliente);
            $this->db->bind(':direccion',$direccion);
            $this->db->bind(':email',$email);
            $this->db->bind(':telefono',$telefono);
            $this->db->bind(':fecha_registro',$fecha_registro);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function editar($cliente,$direccion,$email,$telefono,$id, $fecha_registro){
            $this->db->query("UPDATE clientes SET cliente=:cliente,direccion=:direccion, email=:email, telefono=:telefono, fecha_registro=:fecha_registro WHERE id=:id");
            
            $this->db->bind(':id',$id);
            $this->db->bind(':cliente',$cliente);
            $this->db->bind(':direccion',$direccion);
            $this->db->bind(':email',$email);
            $this->db->bind(':telefono',$telefono);
            $this->db->bind(':fecha_registro',$fecha_registro);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function borrar($id){
            $this->db->query('DELETE FROM clientes  WHERE id = :id');
            $this->db->bind(':id',$id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function total_clientes(){
            $this->db->query('SELECT count(*) as total FROM clientes');
            return $this->db->obtenerRegistro();
        }
    }