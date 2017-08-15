<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Función: proveer el estilo de la web
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página para buscar clientes por móvil o alias

-->
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
         <form action="consultareconomia.php" method="get">
             <label>Año: </label>
             <select id="year" name="year">
                <option value="2016">2016</option>
                <option value="2017">2017</option>
             </select>
             <br>
             <input type="submit" name="buscar" value="Buscar">
         </form>
      </div>
   </body>
   
</html>
