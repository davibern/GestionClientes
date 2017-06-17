<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: proveer el estilo de la web
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: clase padre que inicia sesión y redirigue al index general de la aplicación
    */

    // Comprobar la sesion con una función

    function ComprobarSesion() {

         // Recuperamos sesión si la hubiera
         session_start();

         // Comprobar si está con la sesión iniciada, si no lo está redirigimos a acceder.php
         // Si lo está lo dejamos en la página actual
         if(!isset($_SESSION['usuario'])) {

            header('location:acceder.php');

         }
    }
?>