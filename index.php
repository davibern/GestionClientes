<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página general de la aplicación web

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

      <?php
        // Comprobar sesion
        ComprobarSesion();
      ?>

      <div class="container">
        <header class="header">
              <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $business;?></a></small></h1>
          </header>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!-- Panel Clientes -->
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Clientes</div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img class="img-responsive center-block" src="media/constumer_index.png" width="150" height="150" alt=""/>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 text-center">
                          <br>
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='datosclientes.php'">Crear</button>
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='buscarcliente.php'">Consultar</button>
                        </div>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!-- Panel Economía -->
                <div class="panel panel-success">
                    <div class="panel-heading text-center">Economía</div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img class="img-responsive center-block" src="media/economy_index.png" width="150" height="150" alt=""/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                            <br>
                            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='economyadd.php'">Añadir</button>
                            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='economyview.php'">Consultar</button>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <!-- Panel Usuario -->
            <div class="panel panel-info">
                    <div class="panel-heading text-center">Panel de Usuario</div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img class="img-responsive center-block" src="media/user_index.png" width="150" height="150" alt=""/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                          <br><br>
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='controlusuario.php'"><span class="glyphicon glyphicon-lock"></span> Actualizar contraseña</button><br>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <!-- Panel Sesión & Info-->
            <div class="panel panel-danger">
                    <div class="panel-heading text-center">Sesión & Info</div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <img class="img-responsive center-block" src="media/sesion_index.png" width="150" height="150" alt=""/>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='acercade_controlversiones.php'">Control Versiones</button>
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='acercade_tecnologia.php'">Tecnología</button>
                          <button type="button" class="btn btn-primary btn-lg btn-block" onclick="location.href='cerrar.php'">Cerrar Sesión</button>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
      </div>

   </body>
   
</html>
