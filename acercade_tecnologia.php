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
      <div class="container menu-index">
         <div class="menu-version menu-option">
             <h1>Tecnología Usada</h1>
             <br>
             <ol>
                <li>Lenguaje: <a href="http://php.net/" target="_blank">PHP</a></li>
                <li>Servidor: <a href="http://apache.org/" target="_blank">Apache</a></li>
                <li>Base Datos: <a href="https://www.mysql.com/" target="_blank">MySQL</a></li>
                <li>Framework CSS: <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a></li>
                <li>Framework Javascript: <a href="https://jquery.com/" target="_blank">jQuery</a></li>
                <li>Soporte: <a href="https://es.stackoverflow.com/" target="_blank">StackOverflow ES</a></li>
             </ol>
         </div>
      </div>
   </body>
</html>
