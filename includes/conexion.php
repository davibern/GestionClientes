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

        // Este método es con la clase mysqli, para usarla descomentar y comentar la librería PDO

        /*$this->conexion_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($this->conexion_db->connect_errno){

                echo "Fallo al conectar con la base de datos: " . $this->conexion_db->connect_error;

                return;
            }

            $this->conexion_db->set_charset(DB_CHARSET_Q);
        */
    }

?>
