<?php

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