<?php
    class Database{
        private $host = DB_HOST;
        private $usuario = DB_USUARIO;
        private $password = DB_PASSWORD;
        private $database = DB_DATABASE;

        private $conexion;
        private $statement;
        private $error;

        public function __construct(){
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->database;
            $opciones = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION 
            );

            //crear una instancia de PDO
            try{
                $this->conexion = new PDO($dsn, $this->usuario, $this->password, $opciones);
                $this->conexion->exec('set names utf8');
            } catch (PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        public function query($sql){
            $this->statement = $this->conexion->prepare($sql);
        }

        public function bind(){
            
        }
    }