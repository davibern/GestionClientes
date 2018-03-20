<?php

    /**
    *  Clase modelo que se encargara de realizar las consultas contra la base de datos
    *
    * @author       Davidbp.com
    * @git          https://github.com/DavidBPCode/GestionClientes
    * @version      3.0.1803
    * @created      03/03/2018
    * @modified     -
    * @function     Consultas que actuan directamente contra la base de datos para leer, modificar o eliminar datos
    *               Las consultas son preparadas mediante PDO, por lo que se usa una mascara de sustitucion para ocultar el parametro real,
    *               esto ademas le proporciona seguridad, evitando la inyeccion sql.
    *               Las funciones estaticas devuelven siempre un valor, que es 'success' (se realiza la operacion), o 'error' (no se realiza),
    *               Esto servira para decirle al controlador que es lo que ha pasado y avisar si se ha producido errores
    */

    # Requerimos una vez la clase Connection que guarda la conexion con la base de datos y el servidor
    require_once "connection.class.php";

    class Query extends Connection {

        /**
        *   @name           loginUserModel
        *   @function       Devolver si existe usuario en la base de datos para hacer login
        */
        public static function loginUserModel($datamodel, $table) {

            $sql = "SELECT usuario, password, checklogin FROM $table WHERE usuario = :user";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindparam(':user', $datamodel['user'], PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->Close();

        }

        /**
        *   @name           registerUserModel
        *   @function       Registrar nuevo usuario
        */
        public static function registerUserModel($datamodel, $table) {

            $sql = "INSERT INTO $table (usuario, password, email) VALUES (:user, :pass, :email)";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':user', $datamodel['user'], PDO::PARAM_STR);
            $stmt->bindParam(':pass', $datamodel['pass'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $datamodel['email'], PDO::PARAM_STR);

            if($stmt->execute()) {

                return "success";

            } else {

                echo $datamodel['user']."<br>";
                echo $datamodel['pass']."<br>";
                echo $datamodel['email']."<br>";
                var_dump($stmt);

            }

            $stmt->Close();

        }

        /**
        *   @name           updateCheckLoginModel
        *   @function       Actualizar los intentos de login del usuario
        */
        public static function updateCheckLoginModel($datamodel, $table) {

            $sql = "UPDATE $table SET checklogin = :checklogin WHERE usuario = :user";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':checklogin', $datamodel['newchecklogin'], PDO::PARAM_INT);
            $stmt->bindParam(':user', $datamodel['user'], PDO::PARAM_STR);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           viewUsersModel
        *   @function       Ver todos los usuarios registrados
        */
        public static function viewUsersModel($table) {

            $sql = "SELECT * FROM $table";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->Close();

        }

        /**
        *   @name           editUserModel
        *   @function       Ver el usuario segun su ID
        */
        public static function editUserModel($datamodel, $table) {

            $sql = "SELECT * FROM $table WHERE idusuario = :iduser";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':iduser', $datamodel, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->Close();

        }

        /**
        *   @name           deleteUserModel
        *   @function       Borrar un usuario segun su ID
        */
        public static function deleteUserModel($datamodel, $table) {

            $sql = "DELETE FROM $table WHERE idusuario = :iduser";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':iduser', $datamodel, PDO::PARAM_INT);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           updateUserModel
        *   @function       Actualizar el usuario segun su ID
        */
        public static function updateUserModel($datamodel, $table) {

            $sql = "UPDATE $table SET usuario = :user, password = :pass, email = :email WHERE idusuario = :id";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':id', $datamodel['id'], PDO::PARAM_INT);
            $stmt->bindParam(':user', $datamodel['user'], PDO::PARAM_STR);
            $stmt->bindParam(':pass', $datamodel['pass'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $datamodel['email'], PDO::PARAM_STR);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           viewCustomerModel
        *   @function       Ver todos los clientes registrados
        */
        public static function viewCustomerModel($table) {

            $sql = "SELECT * FROM $table";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->Close();
        }

        /**
        *   @name           editCustomerModel
        *   @function       Mostrar al cliente segun su ID
        */
        public static function editCustomerModel($datamodel, $table) {

            $sql = "SELECT * FROM $table WHERE idclientes = :idcustomer";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':idcustomer', $datamodel, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->Close();

        }

        /**
        *   @name           updateCustomerModel
        *   @function       Actualizar al cliente segun su ID
        */
        public static function updateCustomerModel($datamodel, $table) {

            $sql = "UPDATE $table SET nombre = :nombre,
                                      alias = :alias,
                                      movil = :movil,
                                      direccion = :direccion,
                                      poblacion = :poblacion,
                                      provincia = :provincia,
                                      codigopostal = :codigopostal,
                                      tratamientocapilar = :tratamientocapilar,
                                      tratamientocorporal = :tratamientocorporal,
                                      observaciones = :observaciones
                    WHERE idclientes = :idclientes";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':idclientes', $datamodel['id'], PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $datamodel['name'], PDO::PARAM_STR);
            $stmt->bindParam(':alias', $datamodel['alias'], PDO::PARAM_STR);
            $stmt->bindParam(':movil', $datamodel['movil'], PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $datamodel['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(':poblacion', $datamodel['poblacion'], PDO::PARAM_STR);
            $stmt->bindParam(':provincia', $datamodel['provincia'], PDO::PARAM_STR);
            $stmt->bindParam(':codigopostal', $datamodel['codigopostal'], PDO::PARAM_STR);
            $stmt->bindParam(':tratamientocapilar', $datamodel['tratamientocapilar'], PDO::PARAM_STR);
            $stmt->bindParam(':tratamientocorporal', $datamodel['tratamientocorporal'], PDO::PARAM_STR);
            $stmt->bindParam(':observaciones', $datamodel['observaciones'], PDO::PARAM_STR);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           registerCustomerModel
        *   @function       Registrar un nuevo cliente
        */
        public static function registerCustomerModel($datamodel, $table) {

            $sql = "INSERT INTO $table (nombre, alias, movil, direccion, poblacion, provincia, codigopostal, tratamientocapilar, tratamientocorporal, observaciones)
                    VALUES (:nombre, :alias, :movil, :direccion, :poblacion, :provincia, :codigopostal, :tratamientocapilar, :tratamientocorporal, :observaciones)";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':nombre', $datamodel['name'], PDO::PARAM_STR);
            $stmt->bindParam(':alias', $datamodel['alias'], PDO::PARAM_STR);
            $stmt->bindParam(':movil', $datamodel['mobile'], PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $datamodel['street'], PDO::PARAM_STR);
            $stmt->bindParam(':poblacion', $datamodel['city'], PDO::PARAM_STR);
            $stmt->bindParam(':provincia', $datamodel['province'], PDO::PARAM_STR);
            $stmt->bindParam(':codigopostal', $datamodel['zipcode'], PDO::PARAM_STR);
            $stmt->bindParam(':tratamientocapilar', $datamodel['capilar'], PDO::PARAM_STR);
            $stmt->bindParam(':tratamientocorporal', $datamodel['corporal'], PDO::PARAM_STR);
            $stmt->bindParam(':observaciones', $datamodel['observations'], PDO::PARAM_STR);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           deleteCustomerModel
        *   @function       Borrar un nuevo cliente segun su ID
        */
        public static function deleteCustomerModel($datamodel, $table) {

            $sql = "DELETE FROM $table WHERE idclientes = :idcliente";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':idcliente', $datamodel, PDO::PARAM_INT);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           registerEconomyModel
        *   @function       Registrar un nuevo mues de facturacion
        */
        public static function registerEconomyModel($datamodel, $table) {

            $sql = "INSERT INTO $table (fechainicio, fechafinal, importefacturado, importeinvertido, importeimpuestos, mes, anyo)
                    VALUES (:fechainicio, :fechafinal, :importefacturado, :importeinvertido, :importeimpuestos, :mes, :anyo)";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':fechainicio', $datamodel['initialmonth'], PDO::PARAM_STR);
            $stmt->bindParam(':fechafinal', $datamodel['finalmonth'], PDO::PARAM_STR);
            $stmt->bindParam(':importefacturado', $datamodel['moneyearn'], PDO::PARAM_INT);
            $stmt->bindParam(':importeinvertido', $datamodel['moneyspend'], PDO::PARAM_INT);
            $stmt->bindParam(':importeimpuestos', $datamodel['taxes'], PDO::PARAM_INT);
            $stmt->bindParam(':mes', $datamodel['month'], PDO::PARAM_INT);
            $stmt->bindParam(':anyo', $datamodel['year'], PDO::PARAM_INT);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           viewEconomyModel
        *   @function       Ver los registros facturados del mes
        */
        public static function viewEconomyModel($table) {

            $sql = "SELECT * FROM $table ORDER BY anyo DESC";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->close();

        }

        /**
        *   @name           editEconomyModel
        *   @function       Mostrar el mes segun su ID
        */
        public static function editEconomyModel($datamodel, $table) {

            $sql = "SELECT * FROM $table WHERE idfacturacion = :idfacturacion";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':idfacturacion', $datamodel, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->Close();

        }

        /**
        *   @name           updateEconomyModel
        *   @function       Actualizar el mes segun su ID
        */
        public static function updateEconomyModel($datamodel, $table) {

            $sql = "UPDATE $table SET mes = :mes,
                                      anyo = :anyo,
                                      importefacturado = :importefacturado,
                                      importeinvertido = :importeinvertido
                    WHERE idfacturacion = :idfacturacion";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':idfacturacion', $datamodel['id'], PDO::PARAM_INT);
            $stmt->bindParam(':mes', $datamodel['month'], PDO::PARAM_INT);
            $stmt->bindParam(':anyo', $datamodel['anyo'], PDO::PARAM_INT);
            $stmt->bindParam(':importefacturado', $datamodel['invoice'], PDO::PARAM_INT);
            $stmt->bindParam(':importeinvertido', $datamodel['spend'], PDO::PARAM_INT);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

        /**
        *   @name           deleteEconomyModel
        *   @function       Borrar el mes segun su ID
        */
        public static function deleteEconomyModel($datamodel, $table) {

            $sql = "DELETE FROM $table WHERE idfacturacion = :idfacturacion";

            $stmt = Connection::connect()->prepare($sql);

            $stmt->bindParam(':idfacturacion', $datamodel, PDO::PARAM_INT);

            if($stmt->execute()) {

                return "success";

            } else {

                return "error";

            }

            $stmt->Close();

        }

    }