<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: proveer el estilo de la web
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: cabecera de las páginas de la aplicación web
    */

    // Cabecera de la página
    // Se cargarán datos de estilos así como metadatos

    // Rutas
    define('PATH_CSS_STYLE', './css/style.css');
    define('PATH_CSS_BOOSTRAP', './css/bootstrap.min.css');
    define('PATH_JS_JQUERY', './scripts/jquery-3.2.1.js');
    define('PATH_JS_VALIDATES', './scripts/validaciones.js');

    // Título cabecera páguina
    echo "<title>Gestión Clientes Peluquería</title>";

    // Responsive y otras opciones
    echo "<meta charset='utf-8'>";
    echo "<meta http-equiv='X-UA-Compatible' content='IE-edge'>";
    echo "<meta name'viewport' content='width=device-width, initial-scale=1'>";

    // Incluir scripts y css
    echo "<script type='text/javascript' src=" . PATH_JS_JQUERY . "></script>";
    echo "<script type='text/javascript' src=" . PATH_JS_VALIDATES ."></script>";
    echo "<link rel='stylesheet' type='text/css' href=" . PATH_CSS_BOOSTRAP . ">";
    echo "<link rel='stylesheet' type='text/css' href=" . PATH_CSS_STYLE . ">";
    echo "<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>";
?>
