<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Función: proveer el estilo de la web
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página que devuelve si el cliente ha sido creado o no
  
-->
<?php

   // Incluimos la clase Modificar cliente
   include __DIR__ . '/includes/economia.php';

   // Instanciamos un objeto de modificar cliente
   $nuevaeconomia = new Economy;

   // ModificarCliente contendrá los datos del array asociativo de $_POST que se obtienen de la página editar
   $nuevaeconomia->SetAddNewMonth($_POST);

   // Si Modificar cliente no obtuviese datos se muestra error, de lo contrario se indica que el cliente ha sido modificado
   if($nuevaeconomia == false) {

      $mensaje = "No se ha podido añadir un nuevo mes. Consulta con el administrador.";

   } else {

      $mensaje = "Los nuevos datos económicos se han añadido correctamente. <br><br>
                  <a href='economyadd.php'>Añadir otro mes</a> <br><br>
                  <a href='index.php'>Volver al menú principal</a>";

   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">

   <head>
    <?php

      // Ficheros de configuración y nombre de empresa
      include __DIR__ . '/includes/header.php';
      include __DIR__ . '/includes/empresa.php';

      // Incluir comprobación de sesión
      include __DIR__ . '/session/comprobarsesion.php';

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
         <p><?php echo $mensaje; ?></p>
      </div>
   </body>
   
</html>
