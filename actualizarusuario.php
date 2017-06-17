<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: proveer el estilo de la web
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: función para actualizar el usuario que está logueado
    */

    // Incluir la clase usuario
    require __DIR__ . '/includes/usuario.php';

    // Incluir comprobación de sesión
    include __DIR__ . '/session/comprobarsesion.php';

    ComprobarSesion();

    // Instanciar un objeto de la clase usuario
    $usuario = new Usuario;

    // Guardar las variables POST
    $usuarioactual = $_SESSION['usuario'];
    $passactual = $_POST['currentpass'];
    $passnueva = $_POST['newpass'];

    // Crear un nuevo objeto que llame al médoto setNewPass de la clase Usuario
    $cambiarpassword = $usuario->SetNewPass($passactual, $passnueva);
    
?>
