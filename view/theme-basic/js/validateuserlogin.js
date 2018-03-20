/*===============================================
            Validar Nuevo Login
===============================================*/

function validateLogin() {

    var user = document.querySelector("#userlogin").value;

    /* Validar usuario */
    if(user != "") {

        var caracters = user.length;
        var regex = /^[a-zA-Z0-9]+$/;

        if(caracters > 5) {

            alert("Escriba por favor menos de 6 caracteres.");

            return false;

        }

        if(!regex.test(user)) {

            alert("No use caracteres especiales en el nombre.");

            return false;

        }

    }

    return true;

}