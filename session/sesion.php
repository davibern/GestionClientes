<?php
    //Iniciamos la sesión o recuperamos la anterior, en este caso recuperamos la anterior.
    session_start();
    //Comprobamos con isset que la variable global tenga dato. Si no hay sesión lo devuelve a acceder.
    if(!isset($_SESSION["usuario"])){
        header("Location:../acceder.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">
   <head>
     <?php
            include("includes/header.php");
     ?>
   </head>
   <body>
      <h1>Sesión Iniciada</h1>
      <p>Bienvenido: <?php echo $_SESSION["usuario"]; ?></p>
   </body>
</html>