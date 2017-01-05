<?php

   // Incluimos sólo la clase conexión si no existe
   if(!class_exists('Conexion')) {

      include("includes/conexion.php");
      
   }

   /**
    * Clase que obtendrá la versión y el nombre de la empresa
    */
   class Empresa extends Conexion {

      // Constructor de la supler clase
      function __construct() {

         parent::__construct();

      }

      // Método que traerá el nombre de la empresa que esté en la base de datos
      public function getNameBussines() {

         // Sentencia SQl que trae el nombre de la empresa
         $sql = "SELECT empresa FROM info";

         // Preparar la sentencia PDO con la clase Conexion
         $query = $this->conexion_db->prepare($sql);

         // Ejecutar la sentencia
         $query->execute(array());

         // Guardar el resultado en variable
         $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

         // Cerramos consulta PDO
         $query->closeCursor();

         // Obtenemos el valor de la empresa con un foreach
         foreach($resultado as $elemento) {

            $empresa = $elemento['empresa'];

         }

         // Devolvemos el resultado de la query para la función
         return $empresa;

         // Cerramos la conexion
         $this->conexion_db = null;
      }

   }

?>
