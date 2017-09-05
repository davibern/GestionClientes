<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página para acceder al index principal de la aplicación

-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es">

   <head>
     <?php

      // Ficheros de configuración y nombre de empresa
      include __DIR__ . '/includes/header.php';
      include __DIR__ . '/includes/business.php';

      // Incluir comprobación de sesión
      include __DIR__ . '/session/comprobarsesion.php';

      // Instanciamos un objeto nuevo de empresa para rescatar el nombre de la peluquería
      $namebusiness = new Business();

      // Usamos el método para rescatar nombre de empresa y lo guardamos en otra variable para poder usarla más tarde
      $business = $namebusiness->getNameBusiness();

     ?>
   </head>

   <body>
      <div class="container">
          <header class="header">
             <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $business;?></a></small></h1>
          </header>
      </div>
      <div class="container menu-index">
        <!-- Formulario Acceso -->
        <form action="session/login.php" method="post">
          <div class="row login">
              <!-- usuario -->
              <div class="form-horizontal" role="form">
                <span class="glyphicon glyphicon-user col-lg-2 control-label"></span>
                <div class="col-lg-10">
                    <input type="text" name="user" class="form-control" required>
                </div>
              </div>
              <!-- Contraseña -->
              <div class="form-horizontal" role="form">
                <span class="glyphicon glyphicon-lock col-lg-2 control-label"></span>
                <div class="col-lg-10">
                    <input type="password" name="password" class="form-control" required>
                </div>
              </div>
              <input type="submit" class="btn btn-info btn-acceder" name="enviar" value="Acceder">
          </div>
        </form>
      </div>
   </body>
   
</html>
