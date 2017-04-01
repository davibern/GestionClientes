<?php

    class Conexion {

        protected $conexion_db;
        private $host='localhost';
        private $name='peluqueria';
        private $user='root';
        private $pass='';
        private $charset='SET NAMES utf8';

        public function __construct(){

            try{

                $this->conexion_db = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->name , $this->user, $this->pass,
                              array(PDO::MYSQL_ATTR_INIT_COMMAND => $this->charset));
                $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(Exception $e){

                echo "Error en la conexión: " . $e->getLine();

            }

        }

    }

?>
