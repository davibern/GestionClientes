<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: proveer el estilo de la web
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: función para realizar el login del usuario.
    */

    // Incluimos la clase ComprobarLogin
    include 'comprobarlogin.php';

    // Instanciamos un objeto de la clase ComprobarLogin
    $nuevologin = new ComprobarLogin;

    // Creamos una variable para contener el valor del método CheckUser
    $login = $nuevologin->CheckUser();

?>
