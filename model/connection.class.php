<?php

    /**
     *  DB - Clase para Base de Datos usando PDO 
     *
     * @author		David Bernable
     * @git 		https://github.com/DavidBPCode/GestionClientes
     * @version     3.0.1803
     * @modified     -
     * @function     Clase para conectar a la base de datos
     * 
     */
    
    class Connection {

        # Funcion estatica que devuelve la conexion si no encuentra ningun error
        static public function connect() {

            # Traemos de otro directorio protegido de lectura y escritura los datos de conexion a la base de datos
            $credentials = parse_ini_file(".config/bd.php.ini");

            # Realizamos un try and catch (prueba y captura del error).
            # Si la prueba es verdadera ejecuta el codigo que hay en su interior: realiza la conexion con la base de datos y lo devuelve como valor del metodo
            # Si da error mostrara en pantalla un error en pantalla con el numero de linea que se esta ejecutando mal en el codigo
            try {

                $link = new PDO('mysql:host=' . $credentials["host"] . '; dbname=' . $credentials["dbname"], $credentials["dbuser"], $credentials["dbpass"],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => $credentials["charset"]));

                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $link;

            } catch (Exception $e) {
                
                echo "Error en la conexión: " . $e->getLine();

            }

        }

    }