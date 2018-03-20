<?php

    # Comprobamos si existe sesion, pero para eso primero hay que crearla
    session_start();

    # Si $_SESSION['validate'] es true, es que hay sesion si no es que el usuario no ha realizado el login
    # y se le envia a la pantalla de login
    if(!isset($_SESSION['validate'])) {

        header('location:login');

    }

?>

<div class="container position-cards">
    <div class="card-deck">
        <div class="card">
            <div class="card-img-top icon-user">
                <span class="fas fa-user-plus icon-user"></span>
            </div>
            <div class="card-body">
                <h4 class="card-title text-center">Registrar Nuevo Cliente</h4>
                <p class="card-text text-center">Registra un nuevo cliente en la aplicacion</p>
            </div>
            <div class="card-footer">
                <a href="customerregister"><button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button></a>
            </div>
        </div>
        <div class="card">
            <div class="icon-user">
                <span class="fas fa-users icon-user"></span>
            </div>
            <div class="card-body">
                <h4 class="card-title text-center">Listar Clientes Registrados</h4>
                <p class="card-text text-center">Muestra todos los clientes registrados</p>
            </div>
            <div class="card-footer">
                <a href="customerslist"><button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button></a>
            </div>
        </div>
    </div>
</div>