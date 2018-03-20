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
                <span class="far fa-plus-square icon-user"></span>
            </div>
            <div class="card-body">
                <h4 class="card-title text-center">Registrar Nuevo Mes</h4>
                <p class="card-text text-center">Incluye nuevos datos económicos de un mes en concreto</p>
            </div>
            <div class="card-footer">
                <a href="economyregister"><button class="btn btn-lg btn-primary btn-block" type="submit">Nuevo Mes</button></a>
            </div>
        </div>
        <div class="card">
            <div class="icon-user">
                <span class="far fa-money-bill-alt icon-user"></span>
            </div>
            <div class="card-body">
                <h4 class="card-title text-center">Listar Año Económico</h4>
                <p class="card-text text-center">Muestra todos los registros económicos por año</p>
            </div>
            <div class="card-footer">
                <a href="economylist"><button class="btn btn-lg btn-primary btn-block" type="submit">Listar</button></a>
            </div>
        </div>
    </div>
</div>