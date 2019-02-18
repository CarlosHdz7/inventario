<?php
    class Usuario{
        
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function registrar_usuarios($id_rol,$nombre,$apellido,$usuario,$email,$password, $fecha_registro){
            
            $this->db->query("INSERT INTO usuarios (id,id_rol,nombre,apellido,usuario,email,pass,fecha_registro) VALUES (null, :id_rol,:nombre, :apellido, :usuario, :email, :password, :fecha_registro)");
            
            $this->db->bind(':id_rol',$id_rol);           
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
            $this->db->query("SELECT u.id, r.rol, u.nombre, u.apellido,u.usuario,u.email,u.pass, u.fecha_registro FROM usuarios u INNER JOIN roles r ON u.id_rol = r.id WHERE usuario=:usuario");
            $this->db->bind(':usuario',$usuario);
            return $this->db->obtenerRegistro();
        }

        public function obtener_id($usuario){
            $this->db->query("SELECT id FROM usuarios WHERE usuario=:usuario");
            $this->db->bind(':usuario',$usuario);
            return $this->db->obtenerRegistro();
        }


    }

    