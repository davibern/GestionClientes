<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: proveer el estilo de la web
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: cerrar las sesiones activas del usuario y desconectarlo de la aplicación
    */

   // Recuperamos sesión si la hubiera
   session_start();

   // Cerramos sesión actual
   session_destroy();

   // Movemos al usuario a la página de acceder
   header('location:acceder.php');
?>
