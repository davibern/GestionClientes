<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Función: proveer el estilo de la web
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página que devuelve los registros de un año de facturación

-->
<?php

    // Incluimos la clase de Economia
    include __DIR__ . '/includes/economia.php';
    
    // Creamos un nuevo objeto
    $consultareconomia = new Economy();

    // Obtenemos los valores de los campos del formulario anterior: año
    if(isset($_GET["year"])){

      $year = $_GET["year"];

    }
   
    if(!empty($year)){

      // Si está cumplimentado el año buscará registros por ese valor
      $array_economia = $consultareconomia->GetYearValues($year);

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

    <div class="container menu-search">
      <div class="container">
        <a href="index.php">Home</a> > <a href="economyview.php">Buscar</a>
      </div>
    
      <table class="table table-striped">
        <tr class="header-table">
          <td>Mes</td>
          <td>Año</td>
          <td>Importe Facturado</td>
          <td>Importe Invertido</td>
          <td>Impuestos</td>
        </tr>

        <?php

          foreach($array_economia as $elemento):

        ?>

        <tr>
          <td>
            <?php echo $elemento->mes ?>
          </td>
          <td>
            <?php echo $elemento->anyo ?>
          </td>
          <td>
            <?php echo $elemento->importefacturado ?>
          </td>
          <td>
            <?php echo $elemento->importeinvertido ?>
          </td>
          <td>
            <?php echo $elemento->importeimpuestos ?>
          </td>
        </tr>

        <?php
          endforeach;
        ?>

      </table>

  </body>

</html>
