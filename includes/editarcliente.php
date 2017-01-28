<?php
   // Incluimos la clase conexion
   include("includes/conexion.php");

   /*
    * Clase editar cliente que hereda las propiedades de la clase conexion
    */
   class EditarCliente extends Conexion {

      // Constructor de la clase
      function __construct() {

         //Llamamos al constructor de la clase padre para instanciar la conexión a la base de datos
         parent::__construct();
      }

      // Método para editar el cliente que tenga el valor en $idclientes
      public function EditClient($id) {

         try {

            // Sentencia SQl
            $sql = 'SELECT * FROM clientes WHERE idclientes = "' . $id . '"';

            // Guardamos la variable SQL usando la conexion de $conexion_db de la clase Conexion con el método prepare PDO
            $query = $this->conexion_db->prepare($sql);

            // Guardamos el registro en un array
            $query->execute(array());

            // Preparamos el array con datos asociativos
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            // Cerramos la query
            $query->closeCursor();

            // Devolvemos los resultaodos de la función
            return $resultado;

            // Vaciamos el objeto de la conexion_db
            $this->conexion_db = null;

         } catch (Exception $e) {

            // Si hubiera algún error lo mostramos usando el método GetMessage y getLine
            echo "Error: " . $e->GetMessage() . "<br>Línea: " . $e->getLine();
         }

      }

   }

?>
