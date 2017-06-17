<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Función: proveer el estilo de la web
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página que devuelve los registros del usuario a buscar

-->
<?php

    // Incluimos la clase Devuelve Clientes
    include __DIR__ . '/includes/vercliente.php';
    
    // Creamos un nuevo objeto
    $clientes = new DevuelveClientes();

    // Obtenemos los valores de los campos del formulario anterior
    $alias = $_GET["alias"];
    $number = $_GET["movil"];

   
    if(!empty($alias) && !empty($number)){
      // Si está cumplimentado el alias y el móvil busca por alias y móvil y devolverá los resultados por alias y móvil
      $array_clientes = $clientes->getClientesAliasPhone($alias, $number);
    }elseif(!empty($alias)){
      // Si está cumplimentado el alias busca por alias y devolverá los resultados por alias
      $array_clientes = $clientes->getClientesAlias($alias);
    }elseif(!empty($number)){
      // Si está cumplimentado el móvil busca por móvil y devolverá los resultados por móvil
      $array_clientes = $clientes->getClientesPhone($number);
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
      <a href="index.php">Home</a> > <a href="buscarcliente.php">Buscar</a>
    </div>
    
      <table class="table table-striped">
        <tr class="header-table">
        <td>Alias</td>
        <td>Dirección</td>
        <td>Móvil</td>
        <td>Capilar</td>
        <td>Corporal</td>
        <td>Ver</td>
        <td>Editar</td>
        </tr>

        <?php

          foreach($array_clientes as $elemento):

        ?>

        <tr>
        <td>
          <?php echo $elemento->alias ?>
        </td>
        <td>
          <?php echo $elemento->direccion ?>
        </td>
        <td>
          <?php echo $elemento->movil ?>
        </td>
        <td>
          <?php echo $elemento->tratamientocapilar ?>
        </td>
        <td>
          <?php echo $elemento->tratamientocorporal ?>
        </td>
        <td>
          <a href='vercliente.php?id=<?php echo $elemento->idclientes ?>'><span class='glyphicon glyphicon-search'></span></a>
        </td>
        <td>
          <a href='editar.php?id=<?php echo $elemento->idclientes ?>'><span class='glyphicon glyphicon-edit'></span></a>
        </td>
        </tr>

        <?php
          endforeach;
        ?>

      </table>

  </body>

</html>
