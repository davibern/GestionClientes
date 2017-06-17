<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: proveer el estilo de la web
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: clase padre que busca los datos de los clientes por alias o por número de móvil
    */

   // Incluimos sólo la clase conexión si no existe
   if(!class_exists('Conexion')) {

      include("includes/conexion.php");

   }

    class DevuelveClientes extends Conexion{

        public function __construct(){

            parent::__construct();

        }

        public function getClientesAlias($alias){

            $sql = 'SELECT * FROM clientes WHERE alias = "' . $alias . '"';

            $sentencia = $this->conexion_db->prepare($sql);

            $sentencia->execute(array());

            $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $sentencia->closeCursor();

            return $resultado;

            $this->conexion_db = null;

            // Si se está usando la clase mysqli, entonces hay que descomentar esta línea y comentar la librería PDO

            /*$resultado = $this->conexion_db->query('SELECT * FROM clientes WHERE alias = "'. $alias . '"');

            $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

            return $clientes;*/

        }

        public function getClientesPhone($number){

            $sql = 'SELECT * FROM clientes WHERE movil = "' . $number . '"';

            $sentencia = $this->conexion_db->prepare($sql);

            $sentencia->execute(array());

            $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $sentencia->closeCursor();

            return $resultado;

            $this->conexion_db = null;

        }

        public function getClientesAliasPhone($alias, $number){

            $sql = 'SELECT * FROM clientes WHERE alias = "' . $alias . '" AND movil = "' . $number . '"';

            $sentencia = $this->conexion_db->prepare($sql);

            $sentencia->execute(array());

            $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

            $sentencia->closeCursor();

            return $resultado;

            $this->conexion_db = null;
        }

    }
?>
