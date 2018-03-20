/*===============================================
            Validar Nuevo Registro
===============================================*/

function validateRegister() {

    var user = document.querySelector("#userregister").value;
    var pass = document.querySelector("#passregister").value;
    var email = document.querySelector("#emailregister").value;
    var terms = document.querySelector("#termsregister").checked;

    /* validar usuario */
    if(user != "") {

        var caracters = user.length;
        var regex = /^[a-zA-Z0-9]+$/;

        if (caracters > 5) {

            alert("Escriba por favor menos de 6 caracteres.");

            return false;

        }

        if(!regex.test(user)) {

            alert("No use caracteres especiales en el nombre.");

            return false;

        }

    }

    /* validar password */
    if(pass != "") {

        var caracters = pass.length;
        var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

        if (caracters < 6) {

            alert("La contraseña tiene que tener mas de seis caracteres.");

            return false;

        }

        if(!regex.test(pass)) {

            alert("Usa al menos una mayuscula, una minuscula y numeros.");

            return false;

        }

    }

    /* validar usuario */
    if(email != "") {

        var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if(!regex.test(email)) {

            alert("Usa en el dato del correo electronico la arroba.");

            return false;

        }

    }

    /* Validar terminos */
    if(!terms) {

        alert("No has aceptado las condiciones del registro.");

        document.querySelector("#userregister").value = user;
        document.querySelector("#passregister").value = pass;
        document.querySelector("#emailregister").value = email;

        return false;

    }

    return true;

}
