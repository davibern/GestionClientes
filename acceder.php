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
      <h1>Peluquería y Estética <small><?php echo $empresa;?></small></h1>
      <form action="session/comprobarusuario.php" method="get">
            Usuario:<br>
            <input type="text" name="user">
            <br>
            Contraseña:<br>
            <input type="password" name="password"><br>
            <input type="submit" name="enviar" value="Comprobar">
      </form>
   </body>
</html>