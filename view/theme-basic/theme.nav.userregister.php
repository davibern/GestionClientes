<!-- Register Form -->
<div class="container content-nav col-sm-4">
    <form method="post" onsubmit="return validateRegister()">

        <h2 class="display-4 text-center">Registar Nuevo Usuario</h2><br>

        <div class="form-group row">
            <label for="userregister" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" id="userregister" name="userregister" class="form-control" placeholder="Usuario" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="passregister" class="col-sm-2 col-form-label">Contraseña:</label>
            <div class="col-sm-10">
                <input type="password" id="passregister" name="passregister" class="form-control" placeholder="Contraseña" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="emailregister" class="col-sm-2 col-form-label">Correo Electrónico:</label>
            <div class="col-sm-10">
                <input type="email" id="emailregister" name="emailregister" class="form-control" placeholder="E-mail" required>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check"><br>
                <input type="checkbox" class="form-check-input" id="termsregister" value="acept-terms">
                <label for="termsregister" class="form-check-label">Aceptar Condiciones</label>
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
    $register->registerUserController();

    # Comprobamos que la variable $_GET['do]
    if (isset($_GET['do'])) {

        if($_GET['do'] == "committed") {

            echo '<script type="text/javascript">registerUser();</script>';

        }

    }
