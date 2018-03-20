<body>
    <header class="header">
        <div class="container">
            <h1>Gestión Clientes <small><a href="index.php" class="non-format">Elena Baglietto</a></small></h1>
        </div>
    </header>

    <?php include "theme.nav.php"; ?>

    <section>
        <?php

            # Se crea un objeto nuevo de Controller para llamar al metodo getUrlController
            # getUrlController guardará de $_GET['do'] y lo llevará al método getUrlPagesModel para cambiar la sección según el usuario
            $mvc = new Controller();
            $mvc->getUrlController();

        ?>
    </section>

    <!-- ficheros de validacion -->
    <script src="view/theme-basic/js/validateuserlogin.js"></script>
    <script src="view/theme-basic/js/validateuserregister.js"></script>
    <script src="view/theme-basic/js/validateuserupdater.js"></script>
</body>