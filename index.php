<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">
   <head>
      <?php

        // Ficheros de configuración y nombre de empresa
        include("includes/header.php");
        include("includes/empresa.php");

        // Instanciamos un objeto nuevo de empresa para rescatar el nombre de la peluquería
        $nombreempresa = new Empresa();

        // Usamos el método para rescatar nombre de empresa y lo guardamos en otra variable para poder usarla más tarde
        $empresa = $nombreempresa->getNameBussines();

      ?>
   </head>
   <body>
      <?php

         // Recuperamos sesión si la hubiera
         session_start();

         // Comprobar si está con la sesión iniciada, si no lo está redirigimos a acceder.php
         // Si lo está lo dejamos en la página actual
         if(!isset($_SESSION['usuario'])) {

            header('location:acceder.php');

         }

      ?>
      <div class="container">
         <header class="header">
             <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $empresa;?></a></small></h1>
         </header>
      </div>
      <div class="container menu-index">
         <div class="col-xs-6 col-sm-3 menu-option"><a href="buscarcliente.php">Consulta/Modificar</a></div>
         <div class="col-xs-6 col-sm-3 menu-option"><a href="datosclientes.php">Crear</a></div>
         <div class="col-xs-6 col-sm-3 menu-option"><a href="cerrar.php">Cerrar Sesión</a></div>
         <div class="col-xs-6 col-sm-3 menu-option"><a href="acercade.php">Acerca de...</a></div>
      </div>
      <div class="container menu-index">
         <br>
         <img src="media/fondo-index.png" class="img-rounded">
      </div>
   </body>
</html>
