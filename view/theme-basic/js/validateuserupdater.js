/*===============================================
            Validar Actualizacion Registro
            @name:      DavidBP
            @date:      18/04/2018
            @version:   2.0.1804
===============================================*/

function validateUpdater() {

    var user = document.querySelector('#userupdate').value;
    var pass = document.querySelector('#passupdate').value;
    var email = document.querySelector('#emailupdate').value;

    /* validar usuario */
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

    /* validar password */
    if(pass != "") {

        var caracters = pass.length;
        var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

        if(caracters < 6) {

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
    if (email != "") {

        var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (!regex.test(email)) {

            swal({
                title:  "La @ del E-mail",
                text:   "La dirección de correo electrónico debe tener una arroba (@).",
                icon:   "warning",
                type:   "success"
            });

            return false;

        }

    }

    return true;

}