<?php

   // Recuperamos sesión si la hubiera
   session_start();

   // Cerramos sesión actual
   session_destroy();

   // Movemos al usuario a la página de acceder
   header('location:acceder.php');
?>
