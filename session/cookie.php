<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: proveer el estilo de la web
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: función que genera una cookie básica, aún no está realizando tareas complejas, sólo crea el archivo.
    */

    // Creamos una cookie
    function Cookie() {

        // Variables
        $name = 'Cookie_GestionPeluqueria';
        $description = 'Cookie_Gestion_Clientes_Peluqueria';
        $time = time()+3600;
        $path = '/';
        
        // Creamos la cookie con setcookie()
        setcookie($name, $description, $time, $path);

    }
?>