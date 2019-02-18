<?php
    class Usuario{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function registrar_usuarios($nombre,$apellido,$usuario,$email,$password, $fecha_registro){
            
            $this->db->query("INSERT INTO usuarios (id,nombre,apellido,usuario,email,pass,fecha_registro) VALUES (null, :nombre, :apellido, :usuario, :email, :password, :fecha_registro)");
           
            $this->db->bind(':nombre',$nombre);
            $this->db->bind(':apellido',$apellido);
            $this->db->bind(':usuario',$usuario);
            $this->db->bind(':email',$email);
            $this->db->bind(':password',$password);
            $this->db->bind(':fecha_registro',$fecha_registro);
            
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

        public function obtener_id($usuario){
            $this->db->query("SELECT id FROM usuarios WHERE usuario=:usuario");
            $this->db->bind(':usuario',$usuario);
            return $this->db->obtenerRegistro();
        }


    }

    