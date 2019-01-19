<?php
    class Cliente{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
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
    }