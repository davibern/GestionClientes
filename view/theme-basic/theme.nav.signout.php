<?php

    # Para destruir una sesión primero la creamos y luego llamamos a session_destroy
    # Por último salimos del script para evitar código malicioso
    session_start();
    session_destroy();
    
?>

<h1>Sing Out!</h1>