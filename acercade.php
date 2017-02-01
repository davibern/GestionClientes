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
      <?php

      // Recuperamos sesión si la hubiera
      session_start();

      // Comprobar si está con la sesión iniciada, si no lo está redirigimos a acceder.php
      // Si lo está lo dejamos en la página actual
      if(!isset($_SESSION['usuario'])) {

         header('location:acceder.php');

      }

      ?>
      <div class="container">
         <header class="header">
             <h1>Gestión Clientes <small><a href="index.php" class="non-format"><?php echo $empresa;?></a></small></h1>
         </header>
      </div>
      <div class="container menu-index">
         <div class="menu-version menu-option">
             <h1>Control de Versiones</h1>
             <br>
             <h2>Versión 1.2.2016b</h2>
             <br>
             <ol>
                 <li>Aplicar capa de estilos a la página de login usando bootstrap</li>
                 <li>Capa de seguridad a la aplicación. Es necesario ingresar con usuario y contraseña para acceder a cualquier parte de la web</li>
                 <li>Cambiar en el index el acceso al login por otro de salir (cerrar sesión)</li>
                 <li>La pantalla de index.php si no está con sesión abierta redigirá al usuario a la web de login</li>
             </ol>
             <h2>Versión 1.1.2016b</h2>
             <br>
             <ol>
                 <li>Acceso al index en nombre peluquera por hipervínculo</li>
                 <li>Clase css non format para hipervínculo de cabecera en nombre peluquera</li>
                 <li>Acceso por login en acceder.php usando clase Conexion y librería PDO.</li>
                 <li>Mapa de acceso de las opciones según pantalla</li>
                 <li>Imagen en index de peluquería para decorar la aplicación</li>
                 <li>Redimensionar imagen en index con css3 según resolución</li>
                 <li>Acceso a pantalla de acerca de..., que contenga información según versiones</li>
             </ol>
             <h2>Versión 1.0.2016b</h2>
             <br>
             <ol>
                 <li>Acceso a consulta de clientes por su alias</li>
                 <li>Acceso a editar desde la consulta el cliente seleccionado</li>
                 <li>Acceso a crear nuevo cliente</li>
                 <li>Tema básico usando bootstrap</li>
                 <li>Acceso a control de usuario (sin implementar en los otros accesos)</li>
                 <li>Control de peluquera a través de mysql(usando librería PDO)</li>
                 <li>Accesos a la base de datos usando clases (clase conexion) y librería PDO.</li>
             </ol>
         </div>
      </div>
   </body>
</html>
