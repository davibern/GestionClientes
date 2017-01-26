<?php

    // Incluimos la clase ComprobarLogin
    include("comprobarlogin.php");

    // Instanciamos un objeto de la clase ComprobarLogin
    $nuevologin = new ComprobarLogin;

    // Creamos una variable para contener el valor del método CheckUser
    $login = $nuevologin->CheckUser();

?>
