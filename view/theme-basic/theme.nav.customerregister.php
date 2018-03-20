<!-- Register Form -->
<div class="container content-nav col-sm-5">
    <form method="post" onsubmit="return validateRegister()">

        <h2 class="display-4 text-center">Registar Nuevo Cliente</h2><br>

        <div class="form-group row">
            <label for="nameregister" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" id="nameregister" name="nameregister" class="form-control" placeholder="Nombre completo" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="aliasregister" class="col-sm-2 col-form-label">Alias:</label>
            <div class="col-sm-10">
                <input type="text" id="aliasregister" name="aliasregister" class="form-control" placeholder="Alias" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="movilregister" class="col-sm-2 col-form-label">Móvil:</label>
            <div class="col-sm-10">
                <input type="text" id="movilregister" name="movilregister" class="form-control" placeholder="Número de móvil" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="streetregister" class="col-sm-2 col-form-label">Dirección:</label>
            <div class="col-sm-10">
                <input type="text" id="streetregister" name="streetregister" class="form-control" placeholder="Dirección" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="cityregister" class="col-sm-2 col-form-label">Población:</label>
            <div class="col-sm-10">
                <input type="text" id="cityregister" name="cityregister" class="form-control" placeholder="Población" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="provinceregister" class="col-sm-2 col-form-label">Provincia:</label>
            <div class="col-sm-10">
                <input type="text" id="provinceregister" name="provinceregister" class="form-control" placeholder="Provincia" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="zipcode" class="col-sm-2 col-form-label">Código Postal:</label>
            <div class="col-sm-10">
                <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="Código Postal" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="capilarregister" class="col-sm-2 col-form-label">Tratamiento Capilar:</label>
            <div class="col-sm-10">
                <input type="text" id="capilarregister" name="capilarregister" class="form-control" placeholder="Tratamiento capilar" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="corporalregister" class="col-sm-2 col-form-label">Tratamiento Corporal:</label>
            <div class="col-sm-10">
                <input type="text" id="corporalregister" name="corporalregister" class="form-control" placeholder="Tratamiento corporal" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="observationsregister" class="col-sm-2 col-form-label">Observaciones:</label>
            <div class="col-sm-10">
                <input type="text" id="observationsregister" name="observationsregister" class="form-control" placeholder="Observaciones" required>
            </div>
        </div>

        <button class="btn btn-block btn-primary" type="submit">Registrar</button>

    </form>
</div>

<?php

    # Creamos un nuevo objeto de controlador para lanzar el metodo loginUserController
    # Este metodo llevara los datos a loginUserModel que devolvera si hay o no usuario
    # Y con los datos el controlador enviara al usuario a la zona o mantendra al mismo en la pantalla del login

    $register = new Controller();
    $register->registerCustomerController();

    # Comprobamos que la variable $_GET['do]
    if (isset($_GET['do'])) {

        if($_GET['do'] == "committed") {

            echo "<br><br>Cliente registrado correctamente.";

        }

    }
