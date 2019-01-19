<?php
    class Cliente{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function obtener(){
            $this->db->query('SELECT * FROM clientes');
            return $this->db->obtenerRegistros();
        }

        public function agregar($id_usuario,$cliente,$direccion,$email,$telefono){
            
            $this->db->query("INSERT INTO clientes (id,id_usuario,cliente,direccion,email,telefono) VALUES (null,:id_usuario,:cliente,:direccion,:email,:telefono)");
            
            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':cliente',$cliente);
            $this->db->bind(':direccion',$direccion);
            $this->db->bind(':email',$email);
            $this->db->bind(':telefono',$telefono);

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
    }