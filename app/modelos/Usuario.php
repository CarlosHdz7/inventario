<?php
    class Usuario{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function registrar_usuarios($nombre,$apellido,$usuario,$email,$password){
            
            $this->db->query("INSERT INTO usuarios (id,nombre,apellido,usuario,email,pass) VALUES (null, :nombre, :apellido, :usuario, :email, :password)");
           
            $this->db->bind(':nombre',$nombre);
            $this->db->bind(':apellido',$apellido);
            $this->db->bind(':usuario',$usuario);
            $this->db->bind(':email',$email);
            $this->db->bind(':password',$password);
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function verificar_usuario($usuario){
            $this->db->query("SELECT * FROM usuarios WHERE usuario=:usuario");
            $this->db->bind(':usuario',$usuario);
            return $this->db->obtenerRegistro();
        }
    }

    