<div class="container content-nav col-sm-4">
    <form class="content-login" method="post" onsubmit="return validateLogin()">

        <h2 class="display-4 center-text">Inicio Sesion</h2><br>

        <div class="form-group row align-items-center">
            <label for="userlogin" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text"  class="form-control" id="userlogin" name="userlogin" placeholder="Usuario" required autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="passlogin" class="col-sm-2 col-form-label">Contraseña:</label>
            <div class="col-sm-10">
                <input type="password"  class="form-control" id="passlogin" name="passlogin"placeholder="Contraseña" required>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check col-sm-3">
                <input type="checkbox" class="form-check-input" id="remember" value="remember-me">
                <label for="remember" class="form-check-label">Recordarme</label>
            </div>
        </div>

        <button class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button>

    </form>
</div>

<?php

    # Creamos un nuevo objeto de controlador para lanzar el metodo loginUserController
    # Este metodo llevara los datos a loginUserModel que devolvera si hay o no usuario
    # Y con los datos el controlador enviara al usuario a la zona o mantendra al mismo en la pantalla del login

    $login = new Controller();
    $login->loginUserController();

    # Comprobamos que la variable $_GET['do]
    if (isset($_GET['do'])) {

        if($_GET['do'] == "errorlogin") {
            echo "<br><br>Fallo al ingresar el usuario y contraseña.";
        }

        if($_GET['do'] == "captcha") {
            echo "<br><br>Se mostraria el captcha.";
        }
    }
