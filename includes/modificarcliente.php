<?php

    // Incluimos la clase conexión para crear una que herede de Conexion
    include("conexion.php");

    /*
    * Clase modificar cliente que hereda las propiedades de la clase conexion
    */
   class ModificarCliente extends Conexion {

       // Constructor de la clase
       function __construct(){

           // Constructor de la super clase
           parent::__construct();

       }

    // Método para guardar las modificaciones del cliente
    public function ModificarCliente($datos) {

       // try and catch para capturar errores
       try {

           // Comprobamos que los campos no están vacíos
           if(empty($datos)){

               echo "Los campos están vacíos, no se puede actualizar.";

           } else {

                // Si no están vacíos guardamos en la variable sql la sentencia de actualización
                $sql = "UPDATE clientes SET
                            nombre = ?,
                            alias = ?,
                            movil = ?,
                            direccion = ?,
                            poblacion = ?,
                            provincia = ?,
                            codigopostal = ?,
                            tratamientocapilar = ?,
                            tratamientocorporal = ?,
                            observaciones = ?,
                            modificadopor = ?,
                            fechamodificacion = ?
                        WHERE idclientes = ?";
           }

            // Guardamos la variable SQL y preparamos la consulta con la conexion de la base de datos
            $query = $this->conexion_db->prepare($sql);

            // Ligamos parámetros marcadores (?,?,?,... es decir, cada posición del arreglo con la variable que le corresponde que se recoge de los inputs del formulario)
            // Especificación de tipos de caracteres
            // i->la variable correspondiente es de tipo entero
            // d->la variable correspondiente es de tipo double
            // s->la variable correspondiente es de tipo string
            // b->la variable correspondiente es un blob y se envía en paquetes

            $query->bindParam(1, $datos['nombre'], PDO::PARAM_STR);
            $query->bindParam(2, $datos['alias'], PDO::PARAM_STR);
            $query->bindParam(3, $datos['movil'], PDO::PARAM_STR);
            $query->bindParam(4, $datos['direccion'], PDO::PARAM_STR);
            $query->bindParam(5, $datos['poblacion'], PDO::PARAM_STR);
            $query->bindParam(6, $datos['provincia'], PDO::PARAM_STR);
            $query->bindParam(7, $datos['codigopostal'], PDO::PARAM_STR);
            $query->bindParam(8, $datos['tratamientocapilar'], PDO::PARAM_STR);
            $query->bindParam(9, $datos['tratamientocorporal'], PDO::PARAM_STR);
            $query->bindParam(10, $datos['observaciones'], PDO::PARAM_STR);
            $query->bindParam(11, $datos['usuario'], PDO::PARAM_STR);
            $query->bindParam(12, $datos['fecha'], PDO::PARAM_STR);
            $query->bindParam(13, $datos['idcliente'], PDO::PARAM_STR);
            
            // Ejecutamos la consulta
            $query->execute();

            // Guardamos el resultado en una variable
            $resultado = $query;

            // Cerramos la query
            $query->closeCursor();

            // Devolvemos los resultados a la función
            return $resultado;

            // Vaciamos el objeto
            $this->conexion_db = null;

         } catch (Exception $e) {

           echo "Error en la ejecución de la consulta<br>";
           echo "Mensaje: " . $e->GetMessage() . "<br>";
           echo "Línea: " . $e->getLine();

       }

    }
}
?>
