<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: clase padre muestra los datos de la empresa dada de alta en la base de datos como logo de la página
    */

   // Incluimos sólo la clase conexión si no existe
   if(!class_exists('Conexion')) {

      include("includes/conexion.php");
      
   }

   class Business extends Conexion {

      // Constructor de la supler clase
      function __construct() {

         parent::__construct();

      }

      // Método que traerá el nombre de la empresa que esté en la base de datos
      public function getNameBusiness() {

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
         foreach($resultado as $element) {

            $business = $element['empresa'];

         }

         // Devolvemos el resultado de la query para la función
         return $business;

         // Cerramos la conexion
         $this->conexion_db = null;
      }

   }

?>
