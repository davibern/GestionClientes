/*===============================================
            Alertas y Validaciones
            @name:      DavidBP
            @date:      18/04/2018
            @version:   1.0.1804
===============================================*/

// Registro de nuevo usuario
function registerUser() {
    swal({
        title:  "Usuario Registrado!",
        text:   "El usuario ha sido registrado en la base de datos correctamente.",
        type:   "success",
        icon:   "success"
        }).then(function () {
            // Redirect the user
            window.location.href = "users";
    });
}

// Registro de nuevo cliente
function registerCostumer() {
    swal({
        title:  "Cliente Registrado!",
        text:   "El cliente ha sido registrado en la base de datos correctamente.",
        type:   "success",
        icon:   "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "customers";
    });
}

// Registro de nuevo mes de facturacion
function registerEconomy() {
    swal({
        title:  "Nuevo Mes Facturado!",
        text:   "Se ha facturado un nuevo mes en la base de datos.",
        type:   "success",
        icon:   "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "economy";
    });
}

// Actualizar cliente
function updateCustomer() {
    swal({
        title:  "Cliente Actualizado!",
        text:   "Se ha actualizado correctamente al cliente.",
        type:   "success",
        icon:   "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "customerslist";
    });
}

// Actualizar usuario
function updateUser() {
    swal({
        title: "Usuario Actualizado!",
        text: "Se ha actualizado correctamente al usuario.",
        type: "success",
        icon: "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "userslist";
    });
}

// Actualizar mes
function updateEconomy() {
    swal({
        title: "Mes Actualizado!",
        text: "Se ha actualizado correctamente el mes correspondiente.",
        type: "success",
        icon: "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "economylist";
    });
}

// Borrar usuario
function deleteUser() {
    swal({
        title: "Usuario Eliminado!",
        text: "Se ha eliminado correctamente al usuario de la base de datos.",
        type: "success",
        icon: "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "userslist";
    });
}

// Borrar usuario
function deleteCustomer() {
    swal({
        title: "Cliente Eliminado!",
        text: "Se ha eliminado correctamente al cliente de la base de datos.",
        type: "success",
        icon: "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "customerslist";
    });
}

// Borrar usuario
function deleteEconomy() {
    swal({
        title: "Mes Eliminado!",
        text: "Se ha eliminado correctamente el mes de facturación correspondiente.",
        type: "success",
        icon: "success"
    }).then(function () {
        // Redirect the user
        window.location.href = "economylist";
    });
}