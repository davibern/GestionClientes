<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: clase padre que actualiza la contraseña del usuario que está logueado
    */

    // Incluimos sólo la case conexión si no existe
    if(!class_exists('Conexion')) {

        include("includes/conexion.php");

    }

    // Clase usuario
    Class Usuario extends Conexion{

        // Constructor padre de Conexion para conectar con la base de datos
        public function __construct(){

            parent::__construct();

        }

        // Método que cambia la contaseña
        public function SetNewPass($currentpass, $newpass){

            $usuario = $_SESSION['usuario'];

            $sql = 'SELECT * FROM usuarios WHERE usuario = ?';

            $query = $this->conexion_db->prepare($sql);

            $query->bindParam(1, $usuario, PDO::PARAM_STR);

            $query->execute();
            $row = $query->fetch(PDO::FETCH_ASSOC);

            $idusuario = $row['idusuario'];
            $password = $row['password'];

            $query->closeCursor();

            if(password_verify($currentpass, $password)) {

                $hashpassword = password_hash($newpass, PASSWORD_DEFAULT);
                
                $sql = 'UPDATE usuarios SET
                        password = ?
                        WHERE usuario = ? AND idusuario = ?';

                $query = $this->conexion_db->prepare($sql);

                $query->bindParam(1, $hashpassword, PDO::PARAM_STR);
                $query->bindParam(2, $usuario, PDO::PARAM_STR);
                $query->bindParam(3, $idusuario, PDO::PARAM_INT);

                $query->execute();
                
                // Movemos al usuario a la página de acceder
                header('location:controlusuario.php');

                 $query->closeCursor();

            } else {

                echo "El usuario y contraseña no corresponden";

            }

        }

    }
?>
