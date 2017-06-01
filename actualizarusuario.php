<?php
    // Incluir la clase usuario
    require('includes/usuario.php');

    // Incluir comprobación de sesión
    include('session/comprobarsesion.php');

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
