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

        public function bind($parametro, $valor, $tipo = null){
            if(is_null($tipo)){
                switch(true){
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                    break;

                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                    break;

                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                    break;

                    default:
                        $tipo = PDO::PARAM_STR;
                    break;
                }
            }
            $this->statement->bindValue($parametro, $valor, $tipo);
        }

        public function execute(){
            return $this->statement->execute();
        }


    }