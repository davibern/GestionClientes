<?php

   // Incluimos sólo la clase conexión si no existe
   if(!class_exists('Conexion')) {

      include("includes/conexion.php");
      
   }

    class DevuelveClientes extends Conexion{

        public function DevuelveClientes(){

            parent::__construct();

        }

        public function getClientes($alias){

            $sql = 'SELECT * FROM clientes WHERE alias = "'. $alias . '"';

            $sentencia = $this->conexion_db->prepare($sql);

            $sentencia->execute(array());

            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            $sentencia->closeCursor();

            return $resultado;

            $this->conexion_db = null;

            // Si se está usando la clase mysqli, entonces hay que descomentar esta línea y comentar la librería PDO

            /*$resultado = $this->conexion_db->query('SELECT * FROM clientes WHERE alias = "'. $alias . '"');

            $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

            return $clientes;*/

        }

    }
?>
