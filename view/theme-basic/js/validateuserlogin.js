/*===============================================
            Validar Nuevo Login
            @name:      DavidBP
            @date:      18/04/2018
            @version:   2.0.1804
===============================================*/

function validateLogin() {

    var user = document.querySelector("#userlogin").value;

    /* Validar usuario */
    if(user != "") {

        var caracters = user.length;
        var regex = /^[a-zA-Z0-9]+$/;

        if(caracters > 5) {

            swal({
                title:  "Longitud del Nombre",
                text:   "El nombre no debe superar los 6 caracteres.",
                icon:   "warning",
                type:   "success"
            });

            return false;

        }

        if(!regex.test(user)) {

            swal({
                title:  "Caracteres Especiales",
                text:   "No uses caracteres especiales tales como /#%$;@...",
                icon:   "warning",
                type:   "success"
            });

            return false;

        }

    }

    return true;

}