<!--

  Autor: David Bernabé
  E-mail: david.bern.pal@gmail.com
  Función: proveer el estilo de la web
  Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

  Función: Página accede al formulario para añadir datos económicos

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
        <div class="container menu-create">
            <form action="creareconomia.php" method="POST">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Fecha Inicio</label>
                        <div class="col-lg-10">
                            <input type="date" name="fechainicio" id="fechainicio" class="form-control input_size" placeholder="Fecha inicio..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Fecha Final</label>
                        <div class="col-lg-10">
                            <input type="date" name="fechafinal" id="fechafinal" class="form-control input_size" placeholder="Fecha final..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Imp. Facturado</label>
                        <div class="col-lg-10">
                            <input type="number" name="importefacturado" id="importefacturado" class="form-control input_size" placeholder="Importe facturado..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Imp. Invertido</label>
                        <div class="col-lg-10">
                            <input type="number" name="importeinvertido" id="importeinvertido" class="form-control input_size" placeholder="Importe invertido..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Impuestos</label>
                        <div class="col-lg-10">
                            <input type="number" name="importeimpuestos" id="importeimpuestos" class="form-control input_size" placeholder="Impuestos..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Mes</label>
                        <div class="col-lg-10">
                            <input type="number" name="mes" id="mes" class="form-control input_size" placeholder="Mes..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Año</label>
                        <div class="col-lg-10">
                            <input type="number" name="anyo" id="anyo" class="form-control input_size" placeholder="Año..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" name="enviar" value="Crear" class="btn btn-default">Crear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
   </body>
   
</html>
