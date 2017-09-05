<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página para ver los registros de los clientes
  
-->
<?php

   // Incluir la clase EditarCliente
   include __DIR__ . '/includes/constumer.php';

   // Instanciar un objeto de la clase editar clientes
   $constumer = new Constumer;

   // Traer el valor del cliente a editar
   $idconstumer = $_GET['id'];

   // Crear un objeto nuevo que traiga el cliente a editar usando el método EditClient de EditarCliente
   $editconstumer = $constumer->EditClient($idconstumer);

   // Recorrer todo el array y guardamos cada elmento del campo en su correspondiente variable
   foreach ($editconstumer as $element) {
      $id = $element['idclientes'];
      $nombre = $element['nombre'];
      $alias = $element['alias'];
      $movil = $element['movil'];
      $direccion = $element['direccion'];
      $poblacion = $element['poblacion'];
      $provincia = $element['provincia'];
      $codigopostal = $element['codigopostal'];
      $tratamientocapilar = $element['tratamientocapilar'];
      $tratamientocorporal = $element['tratamientocorporal'];
      $observaciones = $element['observaciones'];
      $modificadopor = $element['modificadopor'];
      $fechamodificacion = $element['fechamodificacion'];
   }

?>
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
      </div>
      <div class="container menu-create">
      <div class="container">
         <a href="index.php">Home</a> > <a href="buscarcliente.php">Buscar</a> > <a href="javascript:history.back()">Ver cliente</a><br><br>
      </div>
         <form action="actualizarcliente.php" method="POST">
           <div class="form-horizontal">
                <div class="form-group hidden">
                     <label class="col-lg-2 control-label">ID Cliente</label>
                     <div class="col-lg-10">
                        <input type="hidden" name="idcliente" id="idcliente" class="form-control input_size" value="<?php echo $id;?>" readonly>
                     </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                        <input type="text" name="nombre" id="nombre" class="form-control input_size" value="<?php echo $nombre;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Alias</label>
                    <div class="col-lg-10">
                        <input type="text" name="alias" id="alias" class="form-control input_size" value="<?php echo $alias;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Móvil</label>
                    <div class="col-lg-10">
                        <input type="text" name="movil" id="movil" class="form-control input_size" value="<?php echo $movil;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Dirección</label>
                    <div class="col-lg-10">
                        <input type="text" name="direccion" id="direccion" class="form-control input_size" value="<?php echo $direccion;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Población</label>
                    <div class="col-lg-10">
                        <input type="text" name="poblacion" id="poblacion" class="form-control input_size" value="<?php echo $poblacion;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Provincia</label>
                    <div class="col-lg-10">
                        <input type="text" name="provincia" id="provincia" class="form-control input_size" value="<?php echo $provincia;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Código Postal</label>
                    <div class="col-lg-10">
                        <input type="text" name="codigopostal" id="codigopostal" class="form-control input_size" value="<?php echo $codigopostal;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tratamiento Capilar</label>
                    <div class="col-lg-10">
                        <input type="text" name="tratamientocapilar" id="tratamientocapilar" class="form-control input_size" value="<?php echo $tratamientocapilar;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Tratamiento Corporal</label>
                    <div class="col-lg-10">
                        <input type="text" name="tratamientocorporal" id="tratamientocorporal" class="form-control input_size" value="<?php echo $tratamientocorporal;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Observaciones</label>
                    <div class="col-lg-10">
                        <input type="text" name="observaciones" id="observaciones" class="form-control input_size" value="<?php echo $observaciones;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Modificado por</label>
                    <div class="col-lg-10">
                        <input type="text" name="tratamientocapilar" id="tratamientocapilar" class="form-control input_size" value="<?php echo $modificadopor;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Fecha modificación</label>
                    <div class="col-lg-10">
                        <input type="text" name="tratamientocorporal" id="tratamientocorporal" class="form-control input_size" value="<?php echo $fechamodificacion;?>" readonly>
                    </div>
                </div>
           </div>
         </form>
      </div>
    </body>
    
</html>
