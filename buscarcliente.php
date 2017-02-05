<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">
   <head>
    <?php

        // Ficheros de configuración y nombre de empresa
        include("includes/header.php");
        include("includes/empresa.php");

        // Incluir comprobación de sesión
        include("session/comprobarsesion.php");

        // Instanciamos un objeto nuevo de empresa para rescatar el nombre de la peluquería
        $nombreempresa = new Empresa();

        // Usamos el método para rescatar nombre de empresa y lo guardamos en otra variable para poder usarla más tarde
        $empresa = $nombreempresa->getNameBussines();

    ?>
   </head>
   <body>
      <?php

        // Comprobar sesion
        ComprobarSesion();

      ?>
      <div class="container">
         <header class="header">
             <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $empresa;?></a></small></h1>
         </header>
      </div>
      <div class="container menu-index menu-search">
         <form action="consultaclientes.php" method="get">
             <label>Alias Cliente: <input type="text" name="alias"></label>
             <input type="submit" name="buscar" value="Buscar">
         </form>
      </div>
   </body>
</html>
