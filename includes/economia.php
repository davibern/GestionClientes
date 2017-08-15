<?php

    /*
    Autor: David Bernabé
    E-mail: david.bern.pal@gmail.com
    Función: proveer lógicamente la conexión con la tabla facturación
    Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0
    */ 

    // Incluimos la clase conexión sólo cuando no haya sido incluida
    if(!class_exists('Conexion')) {

        include("includes/conexion.php");

    }

    /**
    * Clase principal de facturación
    */
    class Economy extends Conexion {
        
        // Constructor de la superclase
        function __construct() {

            parent::__construct();

        }

        // Método para añadir nuevos resultados
        public function SetAddNewMonth($datos) {

            // Try and catch para capturar errores
            try {

                // Comprobamos que los datos no estén vacíos
                if(empty($datos)) {

                    echo "Hay campos vacíos, no se puede añadir nuevos registros.";

                } else {

                    // Guardamos la sentencia SQL en la variable $sql
                    $sql = "INSERT INTO facturacion (fechainicio,
                                                        fechafinal,
                                                        importefacturado,
                                                        importeinvertido,
                                                        importeimpuestos,
                                                        mes,
                                                        anyo) values (?,
                                                                        ?,
                                                                        ?,
                                                                        ?,
                                                                        ?,
                                                                        ?,
                                                                        ?)";

                    //  Guardamos la variable $sql para prepararla para la sentencia PDO
                    $query = $this->conexion_db->prepare($sql);

                    // Ligamos parámetros marcadores del prepare statement
                    $query->bindParam(1, $datos['fechainicio'], PDO::PARAM_STR);
                    $query->bindParam(2, $datos['fechafinal'], PDO::PARAM_STR);
                    $query->bindParam(3, $datos['importefacturado'], PDO::PARAM_INT);
                    $query->bindParam(4, $datos['importeinvertido'], PDO::PARAM_INT);
                    $query->bindParam(5, $datos['importeimpuestos'], PDO::PARAM_INT);
                    $query->bindParam(6, $datos['mes'], PDO::PARAM_INT);
                    $query->bindParam(7, $datos['anyo'], PDO::PARAM_INT);

                    // Ejecutamos la consulta
                    $query->execute();

                    // Guardamos la consulta en una variable
                    $resultado = $query;

                    // Cerramos la query
                    $query->closeCursor();

                    // Devolvemos los resultados a la función
                    return $resultado;

                    // Vaciamos el objeto de la conexión
                    $this->conexion_db = null;

                }

            } catch (Exception $e) {

                echo "Error en la ejecución de la consulta<br>";
                echo "Mensaje " . $e->GetMessage() . "<br>";
                echo "Línea " . $e->getLine();

            }

        }

        // Método para leer registros de un año en concreto
        public function GetYearValues($year) {

            try {

                if(empty($year)) {

                    echo "No se ha seleccionado ningún año.";

                } else {

                    $year = (int)$year;

                    // Guardamos la sentencia sql
                    $sql = 'SELECT * FROM facturacion WHERE anyo = "' . $year . '"';

                    // Creamos variable que hereda de conexión para preparar la consulta guardada en $sql
                    $query = $this->conexion_db->prepare($sql);

                    // Ligamos el parámetro de la consulta preparada
                    //$query->bindParam(1, $year, PDO::PARAM_INT);

                    // Ejecutamos la consulta
                    $query->execute(array());

                    // Guardamos la consulta en una variable para usarla más tarde
                    $resultado = $query->fetchAll(PDO::FETCH_OBJ);

                    // Cerramos la query
                    $query->closeCursor();

                    // Devolvemos los resultados de la conexión
                    return $resultado;

                    // Vaciamos el objeto de la conexión
                    $this->conexion_db = null;

                }

            } catch (Exception $e) {

                echo "Error en la ejecución de la consulta<br>";
                echo "Mensaje " . $e->GetMessage() . "<br>";
                echo "Línea " . $e->getLine();

            }

        }

    }
    
?>