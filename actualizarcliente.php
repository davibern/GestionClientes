<?php

   // Incluimos la clase Modificar cliente
   include("includes/modificarcliente.php");

   // Instanciamos un objeto de modificar cliente
   $modificarcliente = new ModificarCliente;

   // ModificarCliente contendrá los datos del array asociativo de $_POST que se obtienen de la página editar
   $modificarcliente->ModificarCliente($_POST);

   // Si Modificar cliente no obtuviese datos se muestra error, de lo contrario se indica que el cliente ha sido modificado
   if($modificarcliente == false) {

      $mensaje = "No se ha podido modificar el cliente. Consulta con el administrador.";

   } else {

      $mensaje = "El cliente ha sido modificado correctamente. <br><br>
                  <a href='buscarcliente.php'>Buscar otro cliente</a> <br><br>
                  <a href='index.php'>Volver al menú principal</a>";

   }
?>

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
        <div class="container menu-index menu-search">
            <p><?php echo $mensaje; ?></p>
        </div>
   </body>
</html>
