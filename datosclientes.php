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
        <div class="container">
            <header class="header">
                <h1>Gestión Clientes <small><?php echo $empresa;?></small></h1>
            </header>
        </div>
        <div class="container menu-create">
            <form action="crearcliente.php" method="POST">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                            <input type="text" name="nombre" id="nombre" class="form-control input_size" placeholder="Escribe el nombre..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alias</label>
                        <div class="col-lg-10">
                            <input type="text" name="alias" id="alias" class="form-control input_size" placeholder="Escribe el nombre de pila..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Móvil</label>
                        <div class="col-lg-10">
                            <input type="text" name="movil" id="movil" class="form-control input_size" placeholder="Escribe el número móvil..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Dirección</label>
                        <div class="col-lg-10">
                            <input type="text" name="direccion" id="direccion" class="form-control input_size" placeholder="Escribe la dirección..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Población</label>
                        <div class="col-lg-10">
                            <input type="text" name="poblacion" id="poblacion" class="form-control input_size" placeholder="Escribe la población..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Provincia</label>
                        <div class="col-lg-10">
                            <input type="text" name="provincia" id="provincia" class="form-control input_size" placeholder="Escribe la provincia..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Código Postal</label>
                        <div class="col-lg-10">
                            <input type="text" name="codigopostal" id="codigopostal" class="form-control input_size" placeholder="Escribe el código postal..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tratamiento Capilar</label>
                        <div class="col-lg-10">
                            <input type="text" name="tratamientocapilar" id="tratamientocapilar" class="form-control input_size" placeholder="Escribe el tipo de pelo..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tratamiento Corporal</label>
                        <div class="col-lg-10">
                            <input type="text" name="tratamientocorporal" id="tratamientocorporal" class="form-control input_size" placeholder="Escribe el tipo de piel..." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Observaciones</label>
                        <div class="col-lg-10">
                            <textarea type="text" cols="40" rows="4" name="observaciones" id="observaciones" class="form-control input_size" placeholder="Datos de interés..." required></textarea>
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
