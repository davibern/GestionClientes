<?php

    // Incluimos la clase conexión sólo cuando no haya sido incluida
    if(!class_exists('Conexion')) {

        include("includes/conexion.php");

    }

     /**
    * Clase que creará un registro nuevo de cliente
    */
    class CrearCliente extends Conexion {

        // Constructor de la superclase
        function __construct() {

            parent::__construct();

        }

        // Método para crear a un cliente nuevo
        public function SetNewConstumer($datos) {

            // Try and catch para capturar errores
            try {

                // Comprobamos que los datos no estén vacíos
                if(empty($datos)) {

                    echo "Hay campos vacíos, no se puede crear al cliente nuevo.";

                } else {

                    // Guardamos la setencia SQL en la variable $sql
                    $sql = "INSERT INTO clientes (nombre,
                                                    alias,
                                                    movil,
                                                    direccion,
                                                    poblacion,
                                                    provincia,
                                                    codigopostal,
                                                    tratamientocapilar,
                                                    tratamientocorporal,
                                                    observaciones) values (?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?)";

                }

                // Guardamos la variable $sql para prepararla para la sentencia PDO
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

                // Ejecutamos la consulta
                $query->execute();

                // Guardamos la consulta en una variable
                $resultado = $query;

                // Cerramos la query
                $query->closeCursor();

                // Devolvemos los resultados a la función
                return $resultado;

                // Vaciamos el objeto de conexion
                $this->conexion_db = null;

            } catch (Exception $e) {

                echo "Error en la ejecución de la consulta<br>";
                echo "Mensaje: " . $e->GetMessage() . "<br>";
                echo "Línea: " . $e->getLine();

            }

        }

    }

?>
