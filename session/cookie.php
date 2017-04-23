<?php

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