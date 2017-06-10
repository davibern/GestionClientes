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
      <div class="container menu-index">
         <?php
            $sesionusuario = $_SESSION['usuario'];
         ?>
         <div>
            <p>Usuario conectado: <b><?php echo $sesionusuario; ?></b></p>
         </div>
         <div>
            <p>Cambiar contraseña</p>
         </div>
         <form action="actualizarusuario.php" method="post">
            <div class="row login">
              <!-- contraseña actual -->
              <div class="form-horizontal" role="form">
                <span class="col-lg-2 control-label">Actual</span>
                <div class="col-lg-10">
                  <input type="password" name="currentpass" class="form-control" require>
                </div>
              </div>
              <!-- contraseña nueva -->
              <div class="form-horizontal" role="form">
                <span class="col-lg-2 control-label">Nueva</span>
                <div class="col-lg-10">
                  <input type="password" name="newpass" class="form-control" require>
                </div>
              </div>
              <!-- contraseña repetir -->
              <div class="form-horizontal" role="form">
                <span class="col-lg-2 control-label">Repetir</span>
                <div class="col-lg-10">
                  <input type="password" name="repeatpass" class="form-control" require>
                </div>
              </div>
              <input type="submit" class="btn btn-info btn-acceder" name="upgradepass" value="Actualizar">
            </div>
         </form>
      </div>
   </body>
</html>
