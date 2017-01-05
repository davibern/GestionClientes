<?php
    require("../includes/configuracion.php");
    
    try{

        $connection = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME , DB_USER, DB_PASS,
                              array(PDO::MYSQL_ATTR_INIT_COMMAND => DB_CHARSET));

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM usuarios WHERE usuario = :user AND password = :password";

        $resultado = $connection->prepare($sql);

        $usuario = htmlentities(addslashes($_GET["user"]));
        $password = htmlentities(addslashes($_GET["password"]));

        $resultado->bindValue(":user", $usuario);
        $resultado->bindValue(":password", $password);

        $resultado->execute();
        
        $comprobarusuario = $resultado->rowCount();

        if($comprobarusuario != 0){

            //Iniciar sesión
            session_start();
            //Guardar en la variable superglobal el nombre de usuario
            $_SESSION["usuario"] = $_GET["user"];

            header("location:sesion.php");

        }else{

            header("location:../acceder.php");

        }

    }catch(Exception $e){

        die("Error en la conexión: " . $e->getMessage());

    }
?>