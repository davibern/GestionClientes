/*===============================================
            Validar Nuevo Registro
            @name:      DavidBP
            @date:      18/04/2018
            @version:   2.0.1804
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

    /* validar password */
    if(pass != "") {

        var caracters = pass.length;
        var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

        if (caracters < 6) {

            swal({
                title:  "Longitud de la Contraseña",
                text:   "La contraseña tiene que tiener más de seis caracteres.",
                icon:   "warning",
                type:   "success"
            });

            return false;

        }

        if(!regex.test(pass)) {

            swal({
                title:  "Contraseña Fuerte",
                text:   "La contraseña tiene que tener al menos una mayúscula, una minúscula y números.",
                icon:   "warning",
                type:   "success"
            });

            return false;

        }

    }

    /* validar usuario */
    if(email != "") {

        var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if(!regex.test(email)) {

            swal({
                title:  "La @ del E-mail",
                text:   "La dirección de correo electrónico debe tener una arroba (@).",
                icon:   "warning",
                type:   "success"
            });

            return false;

        }

    }

    /* Validar terminos */
    if(!terms) {

        swal({
            title:  "Aceptar Condiciones",
            text:   "No has aceptado las condiciones de uso de la plataforma.",
            icon:   "warning",
            type:   "success"
        });

        document.querySelector("#userregister").value = user;
        document.querySelector("#passregister").value = pass;
        document.querySelector("#emailregister").value = email;

        return false;

    }

    return true;

}
