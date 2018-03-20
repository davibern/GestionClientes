<?php

    /**
    *  Gestion Clientes Peluqueria
    *
    * @author		David Bernabe
    * @git          https://github.com/DavidBPCode/GestionClientes
    * @version      3.0.1803
    * 
    */
    
    # Limpiar cabeceras
    @ob_start();

    # Ficheros necesarios para cargar el modelo MVC
    require_once "controller/controller.php";
    require_once "model/urlmodel.class.php";
    require_once "model/query.class.php";

    # Se inicia un objeto de Controller para cargar la plantilla por defecto "Theme-basic"
    $mvc = new Controller();
    $mvc->getTemplate();