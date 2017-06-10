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
        <div class="col-sm-6">
         <!-- Card control de versiones -->
         <div class="card card-general card-right">
            <div class"card-block">
              <h3 class="card-title">Control de Versiones</h3>
              <p class="card-text">Accede para ver la evolución de la aplicación y las características que se han ido añadiendo.</p>
              <a href="acercade_controlversiones.php" class="btn btn-primary">Acceder</a>
              <p></p>
            </div>
         </div>
        </div>
        <div class="col-sm-6">
         <!-- Card Tecnología usada -->
         <div class="card card-general card-left">
            <div class"card-block">
              <h3 class="card-title">Tecnología</h3>
              <p class="card-text">Accede para ver que frameworks se están usando en la aplicación web.</p>
              <a href="acercade_tecnologia.php" class="btn btn-primary">Acceder</a>
              <p></p>
            </div>
         </div>
        </div>
      </div>
   </body>
</html>
