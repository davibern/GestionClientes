<?php

    // Incluimos la clase conexión sólo cuando no haya sido incluida
    if(!class_exists('Conexion')) {

        include('../includes/conexion.php');

    }

    /**
    * Clase que comprobará si existe usuario en la base de datos
    */
    class ComprobarLogin extends Conexion {

        // Constructor de la superclase, necesario para iniciar la clase de conexión cuando llamemos a la clase ComprobarLogin
        public function __construct() {

            parent::__construct();

        }

        // Método que comprueba si el usuario y contraseña que ingresa en el formulario está en la base de datos
        public function CheckUser() {

            // Try and cacth para capturar errores
            try {

                    // Guardamos la sentencia sql para sacar obtener al usuario de la base de datos
                    $sql = 'SELECT * FROM usuarios WHERE usuario = ? AND password = ?';

                    // Preparamos la consulta con la sentencia guardada en $sql usando el atributo de la clase Conexion
                    $query = $this->conexion_db->prepare($sql);

                    // Evitamos inyección sql
                    $user = htmlentities(addslashes($_POST['user']));
                    $password = htmlentities(addslashes($_POST['password']));

                    // Ligamos los parámetros de la consulta usando bindParam con lo que haya escrito el usuario en el formulario de login
                    $query->bindParam(1, $user, PDO::PARAM_STR);
                    $query->bindParam(2, $password, PDO::PARAM_STR);

                    // Ejecutamos la consulta
                    $query->execute();

                    // Guardamos la ejecución de la consulta en una variable. A $query le aplicamos el método rowCount() que devuelve 0 ó 1 si existen filas
                    // 0 - No devuelve ninguna fila la consulta
                    // 1 - Devuelve una fila si encuentra al usuario
                    $numRegistros = $query->rowCount();

                    // Comprobamos si devuelve algo el métod rowCount()
                    if($numRegistros!=0) {

                        // Iniciamos sesión
                        session_start();

                        // Guardamos en la variable supergoblal el nombre de usuario
                        //$_SESSION['usuario'] = $_GET['user'];

                        // Dirigimos al usuario a una página temporal para comprobar que funciona
                        echo "Bienvenido";

                    } else {

                        // Dirigimos al usuario de nuevo a la página de login
                        echo "Usuario incorrecto";

                    }

            } catch (Exception $e) {

                echo "Error en la ejecución de la consulta<br>";
                echo "Mensaje: " . $e->GetMessage() . "<br>";
                echo "Línea: " . $e->getLine();

            }
        }
    }
?>
