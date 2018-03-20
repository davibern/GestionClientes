<!-- Register Form -->
<div class="container content-nav col-sm-3">
    <form method="post" onsubmit="return validateRegister()">

        <h2 class="display-4 text-center">Incluir Nuevo Mes</h2><br>

        <div class="form-group row">
            <label for="fechainicio" class="col-sm-4 col-form-label">Fecha Inicio:</label>
            <div class="col-sm-8">
                <input type="date" id="fechainicio" name="fechainicio" class="form-control" placeholder="Fecha de inicio" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="fechafinal" class="col-sm-4 col-form-label">Fecha Final:</label>
            <div class="col-sm-8">
                <input type="date" id="fechafinal" name="fechafinal" class="form-control" placeholder="Fecha de fin" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="importefacturado" class="col-sm-4 col-form-label">Importe Facturado:</label>
            <div class="col-sm-8">
                <input type="number" id="importefacturado" name="importefacturado" class="form-control" placeholder="Importe facturado" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="importeinvertido" class="col-sm-4 col-form-label">Importe Invertido:</label>
            <div class="col-sm-8">
                <input type="number" id="importeinvertido" name="importeinvertido" class="form-control" placeholder="Importe invertido" required>
            </div>
        </div>
    
        <div class="form-group row">
            <label for="impuestos" class="col-sm-4 col-form-label">Impuestos:</label>
            <div class="col-sm-8">
                <input type="number" id="impuestos" name="impuestos" class="form-control" placeholder="Impuestos" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="mes" class="col-sm-4 col-form-label">Mes:</label>
            <div class="col-sm-8">
                <input type="number" id="mes" name="mes" class="form-control" placeholder="Mes" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="anyo" class="col-sm-4 col-form-label">Año:</label>
            <div class="col-sm-8">
                <input type="number" id="anyo" name="anyo" class="form-control" placeholder="Año" required>
            </div>
        </div>

        <button class="btn btn-block btn-primary" type="submit">Registrar Nuevo Mes</button>

    </form>
</div>

<?php

    # Creamos un nuevo objeto de controlador para lanzar el metodo loginUserController
    # Este metodo llevara los datos a loginUserModel que devolvera si hay o no usuario
    # Y con los datos el controlador enviara al usuario a la zona o mantendra al mismo en la pantalla del login

    $register = new Controller();
    $register->registerEconomyController();

    # Comprobamos que la variable $_GET['do]
    if (isset($_GET['do'])) {

        if($_GET['do'] == "committed") {

            echo "<br><br>Mes registrado correctamente.";

        }

    }
