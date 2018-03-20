<?php

    # Comprobamos si existe sesion, pero para eso primero hay que crearla
    session_start();

    # Si $_SESSION['validate'] es true, es que hay sesion si no es que el usuario no ha realizado el login
    # y se le envia a la pantalla de login
    if(!isset($_SESSION['validate'])) {

        header('location:login');

    }

?>

<div class="container table-position">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Alias</th>
                <th>Dirección</th>
                <th>Móvil</th>
                <th class="center-text">Editar</th>
                <th class="center-text">Borrar</th>
            </tr>
        </thead>
        <tbody>

            <?php

                # Creamos un objeto de Controller para lanzar el metodo para leer y borrar usuarios
                $viewuser = new Controller();
                $viewuser->viewCustomerController();
                $viewuser->deleteCustomerController();

            ?>  

        </tbody>
    </table>
</div>

<?php

    # Comprobamos la variable super global $_GET['do'] para validar si se ha creado usuario nuevo
    # Primero validamos si existe
    # Luego comprobamos si contiene 'commited', de ser TRUE pasamos por pantalla que se ha registrado satisfactoriamente
    if (isset($_GET['do'])) {

        if($_GET['do'] == "updatedcustomer") {
            echo "<br><br>Cliente actualizado correctamente.";
        }
        
    }