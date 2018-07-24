<?php

    # Comprobamos si existe sesion, pero para eso primero hay que crearla
    session_start();

    # Si $_SESSION['validate'] es true, es que hay sesion si no es que el usuario no ha realizado el login
    # y se le envia a la pantalla de login
    if(!isset($_SESSION['validate'])) {

        header('location:login');

    }

?>

<div class="container">
    <div clas="row">
        <h1 class="text-center">Usuario Conectado: <?php echo $_SESSION['name']; ?></h2>
    </div>
    <div class="background-home">
    </div>
</div>
