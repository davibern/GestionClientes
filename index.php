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
        <div class="container">
            <header class="header">
                <h1>Gestión Clientes <small><?php echo $empresa;?></small></h1>
            </header>
        </div>
        <div class="container menu-index">
            <div class="col-xs-6 col-sm-4 menu-option"><a href="buscarcliente.php">Consulta/Modificar</a></div>
            <div class="col-xs-6 col-sm-4 menu-option"><a href="datosclientes.php">Crear</a></div>
            <div class="col-xs-6 col-sm-4 menu-option"><a href="acceder.php">Acceder</a></div>
        </div>
   </body>
</html>
