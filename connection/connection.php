<?php

class connection{
    private $servidor="localhost";
        private $user="root";
        private $password="";
        private $connection;

        public function __construct(){
            try {
                $this->connection= new PDO("mysql:host=$this->servidor;dbname=animedb",$this->user,$this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch( PDOException $e){
                return "falla de conexion".$e;
            }
        }

        public function ejecutar($sql){
            $this->connection->exec($sql);
            return $this->connection->lastInsertId();
        }

        public function consultar($sql){
            $sentence =$this->connection->prepare($sql);
            $sentence ->execute();
            return $sentence ->fetchAll();
        }
        
    }
?>