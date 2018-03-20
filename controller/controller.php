<?php

    /**
    *  Clase controlador que se encargar de enviar al modelo las peticiones recogidas de la vista
    *
    * @author       Davidbp.com
    * @git          https://github.com/DavidBPCode/GestionClientes
    * @version      3.0.1803
    * @created      03/03/2018
    * @modified     -
    * @function     Se recogen lo datos de la vista, se guardan en una matriz o variable y dichos datos se envian al modelo para que sean
    *               tatados en la base de datos
    */

     Class Controller {

        /**
        *   @name           getTemplate
        *   @function       Cargar el tema basico o plantilla de la aplicacion web
        */
        public function getTemplate() {

            include "view/theme-basic/theme.basic.php";

        }

        /**
        *   @name           getUrlController
        *   @function       Interaccion del usuario cuando haga click en el menu de navegacion del index que esta en view/theme-basic/theme.nav.php
        */
        public function getUrlController() {

            if(isset($_GET['do'])) {

                $urlcontroller = $_GET['do'];

            } else {

                $urlcontroller = 'index';

            }

            $return = UrlModel::getUrlModel($urlcontroller);

            include $return;

        }

        /**
        *   @name           loginUserController
        *   @function       Recoger datos del usuario para comprobar si existe en la base de datos y generar un login
        */
        public function loginUserController() {

            if(isset($_POST['userlogin'])) {

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['userlogin']) && preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $_POST['passlogin'])) {

                    $datacontroller = array("user"=>$_POST['userlogin'], "pass"=>$_POST['passlogin']);

                    $return = Query::loginUserModel($datacontroller, "usuarios");

                    # Validar intentos maximos de login
                    $checklogin = $return['checklogin'];
                    $maxchecklogin = 2;

                    # Si no se supera el maximo de intentos
                    if($checklogin < $maxchecklogin) {

                        if(password_verify($datacontroller['pass'], $return['password'])) {

                            session_start();

                            $_SESSION['validate'] = true;

                            # Pasar a 0 el numero de intentos si se hace login satisfactoriamente
                            $datacontroller = array("user"=>$_POST['userlogin'], "newchecklogin"=>0);
                            $return = Query::updateCheckLoginModel($datacontroller, "usuarios");

                            header("location:index");

                        } else {

                            # Si falla al hacer login incrementamos en uno los intentos de login
                            ++$checklogin;

                            # Actualizar el numero maximo de intentos en la base de datos
                            $datacontroller = array("user"=>$_POST['userlogin'], "newchecklogin"=>$checklogin);
                            $return = Query::updateCheckLoginModel($datacontroller, "usuarios");

                            header("location:errorlogin");

                        }

                    } else {

                        # Si ha superado el numero de intentos entonces volvemos a poner a 0 el contador y se mostraria el captcha
                        $datacontroller = array("user"=>$_POST['userlogin'], "newchecklogin"=>0);
                        $return = Query::updateCheckLoginModel($datacontroller, "usuarios");

                        header("location:captcha");

                    }

                }

            }

        }

        /**
        *   @name           registerUserController
        *   @function       Registrar un nuevo usuario segun los datos recogidos en la vista
        */
        public function registerUserController() {

            if(isset($_POST['userregister'])) {

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['userregister']) &&
                   preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $_POST['passregister']) &&
                   preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $_POST['emailregister'])) {

                    # Encriptamos el password usando password_hash
                    $hashpassword = password_hash($_POST['passregister'], PASSWORD_DEFAULT);

                    $datacontroller = array("user"=>$_POST['userregister'],
                                            "pass"=>$hashpassword,
                                            "email"=>$_POST['emailregister']);

                    $return = Query::registerUserModel($datacontroller, "usuarios");

                    if($return == "success") {

                        header("location:committed");

                    } else {

                        header("location:index.php");

                    }

                }

            }

        }

        /**
        *   @name           viewCustomerController
        *   @function       Buscar a todos los los clientes y mostrarlos
        */
        public function viewCustomerController() {

            $return = Query::viewCustomerModel('clientes');

            foreach ($return as $row => $item) {

                echo '<tr>
                        <td>' . $item['nombre'] . '</td>
                        <td>' . $item['alias'] . '</td>
                        <td>' . $item['direccion'] . '</td>
                        <td>' . $item['movil'] . '</td>
                        <td class="center-text"><a href="index.php?do=customeredit&id='. $item["idclientes"] . '"><span class="fas fa-edit"></span></a></td>
                        <td class="center-text"><a href="index.php?do=customerslist&deleteid='. $item["idclientes"] . '"><span class="fas fa-trash"></span></a></td>
                    </tr>';

            }

        }

        /**
        *   @name           editCustomerController
        *   @function       Devuelve los datos segun el ID para editarlos
        */
        public function editCustomerController() {

            $datacontroller = $_GET['id'];

            $return = Query::editCustomerModel($datacontroller, 'clientes');

            echo '
            <input type="hidden" value="' . $return['idclientes'] . '" name="idupdate" id="idupdate" required>

            <div class="form-group row">
                <label for="nameupdate" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['nombre'] . '" name="nameupdate" class="form-control" id="nameupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="ailasupdate" class="col-sm-2 col-form-label">Alias:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['alias'] . '" name="ailasupdate" class="form-control" id="ailasupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="mobileupdate" class="col-sm-2 col-form-label">Móvil:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['movil'] . '" name="mobileupdate" class="form-control" id="mobileupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="streetupdate" class="col-sm-2 col-form-label">Dirección:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['direccion'] . '" name="streetupdate" class="form-control" id="streetupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="cityupdate" class="col-sm-2 col-form-label">Población:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['poblacion'] . '" name="cityupdate" class="form-control" id="cityupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="capitalupdate" class="col-sm-2 col-form-label">Provincia:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['provincia'] . '" name="capitalupdate" class="form-control" id="capitalupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="zipcode" class="col-sm-2 col-form-label">Código Postal:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['codigopostal'] . '" name="zipcode" class="form-control" id="zipcode" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="capilarupdate" class="col-sm-2 col-form-label">Tratamiento Capilar:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['tratamientocapilar'] . '" name="capilarupdate" class="form-control" id="capilarupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="corporalupdate" class="col-sm-2 col-form-label">Tratamiento Corporal:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['tratamientocorporal'] . '" name="corporalupdate" class="form-control" id="corporalupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="observationsrupdate" class="col-sm-2 col-form-label">Observaciones:</label>
                <div class="col-sm-10">
                    <input type="text" value="' . $return['observaciones'] . '" name="observationsrupdate" class="form-control" id="observationsrupdate" required>
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar</button>';

        }

        /**
        *   @name           editCustomerController
        *   @function       Actualizar los valores del cliente en funcion del ID seleccionado
        */
        public function updateCustomerController() {

            if(isset($_POST['nameupdate'])) {

                $datacontroller = array('id'=>$_POST['idupdate'],
                                        'name'=>$_POST['nameupdate'],
                                        'alias'=>$_POST['ailasupdate'],
                                        'movil'=>$_POST['mobileupdate'],
                                        'direccion'=>$_POST['streetupdate'],
                                        'poblacion'=>$_POST['cityupdate'],
                                        'provincia'=>$_POST['capitalupdate'],
                                        'codigopostal'=>$_POST['zipcode'],
                                        'tratamientocapilar'=>$_POST['capilarupdate'],
                                        'tratamientocorporal'=>$_POST['corporalupdate'],
                                        'observaciones'=>$_POST['observationsrupdate']);

                $return = Query::updateCustomerModel($datacontroller, 'clientes');

                if($return == "success") {

                   //header("location:index.php");
                   echo "El cliente ha sido actualizado con éxito.";

                } else {

                    header("location:index.php");

                }

            }

        }

        /**
        *   @name           registerCustomerController
        *   @function       Crear un nuevo cliente
        */
        public function registerCustomerController() {

            if(isset($_POST['nameregister'])) {
                
                $datacontroller = array('name'=>$_POST['nameregister'],
                                        'alias'=>$_POST['aliasregister'],
                                        'mobile'=>$_POST['movilregister'],
                                        'street'=>$_POST['streetregister'],
                                        'city'=>$_POST['cityregister'],
                                        'province'=>$_POST['provinceregister'],
                                        'zipcode'=>$_POST['zipcode'],
                                        'capilar'=>$_POST['capilarregister'],
                                        'corporal'=>$_POST['corporalregister'],
                                        'observations'=>$_POST['observationsregister']);

                $return = Query::registerCustomerModel($datacontroller, 'clientes');

                if($return == "success") {

                    header("location:committed");

                } else {

                    header("location:index.php");

                }

            }

        }

        /**
        *   @name           deleteCustomerController
        *   @function       Borrar a un cliente segun su ID
        */        
        public function deleteCustomerController() {

            if(isset($_GET['deleteid'])) {

                $datacontroller = $_GET['deleteid'];

                $return = Query::deleteCustomerModel($datacontroller, 'clientes');

                if($return == 'success') {

                    header('location:customerslist');

                } 

            } else {
                
                echo 'error';

            }

        }

        /**
        *   @name           viewUsersController
        *   @function       Ver todos los usuarios registrados en la base de datos
        */
        public function viewUsersController() {

            $return = Query::viewUsersModel('usuarios');

            foreach ($return as $row => $item) {

                echo '<tr>
                        <td>' . $item['usuario'] . '</td>
                        <td>' . $item['password'] . '</td>
                        <td>' . $item['email'] . '</td>
                        <td class="center-text"><a href="index.php?do=useredit&id='. $item["idusuario"] . '"><span class="fas fa-edit"></span></a></td>
                        <td class="center-text"><a href="index.php?do=userslist&deleteid='. $item["idusuario"] . '"><span class="fas fa-trash"></span></a></td>
                    </tr>';

            }

        }

        /**
        *   @name           editUserController
        *   @function       Editar el usuario que es mostrado segun su ID
        */
        public function editUserController() {

            $datacontroller = $_GET['id'];

            $return = Query::editUserModel($datacontroller, 'usuarios');

            echo '
            <input type="hidden" value="' . $return['idusuario'] . '" name="idupdate" id="idupdate" required>

            <div class="form-group row">
                <label for="userupdate" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="' . $return['usuario'] . '" name="userupdate" id="userupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="passupdate" class="col-sm-2 col-form-label">Contraseña:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="" name="passupdate" id="passupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="emailupdate" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="' . $return['email'] . '" name="emailupdate" id="emailupdate" required>
                </div>
            </div>

            <button class="btn btn-primary btn-block" type="submit">Actualizar Usuario</button>';

        }

        /**
        *   @name           deleteUserController
        *   @function       Borrar al usuario seleccionado segun su ID
        */
        public function deleteUserController() {

            if(isset($_GET['deleteid'])) {

                $datacontroller = $_GET['deleteid'];

                $return = Query::deleteUserModel($datacontroller, 'usuarios');

                if($return == 'success') {

                    header('location:userslist');

                }

            }

        }

        /**
        *   @name           updateUserController
        *   @function       Actualizar al usuario seleccionado segun su ID
        */
        public function updateUserController() {

            if(isset($_POST['userupdate'])) {

                if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['userupdate']) &&
                   preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $_POST['passupdate']) &&
                   preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $_POST['emailupdate'])) {

                    # Encriptamos la password usando password_hast
                    $hashpassword = password_hash($_POST['passupdate'], PASSWORD_DEFAULT);

                    $datacontroller = array('id'=>$_POST['idupdate'],
                                            'user'=>$_POST['userupdate'],
                                            'pass'=>$hashpassword,
                                            'email'=>$_POST['emailupdate']);

                    $return = Query::updateUserModel($datacontroller, 'usuarios');

                    if($return == "success") {

                        header("location:updated");

                    } else {

                        header("location:index.php");

                    }

                }

            }

        }

        /**
        *   @name           registerEconomyController
        *   @function       Registrar un nuevo mes de facturacion
        */
        public function registerEconomyController() {

            if(isset($_POST['fechainicio'])) {

                $datacontroller = array('initialmonth'=>$_POST['fechainicio'],
                                        'finalmonth'=>$_POST['fechafinal'],
                                        'moneyearn'=>$_POST['importefacturado'],
                                        'moneyspend'=>$_POST['importeinvertido'],
                                        'taxes'=>$_POST['impuestos'],
                                        'month'=>$_POST['mes'],
                                        'year'=>$_POST['anyo']);

                $return = Query::registerEconomyModel($datacontroller, 'facturacion');

                if($return == "success") {

                    header("location:committed");

                } else {

                    header("location:index.php");

                }

            }

        }

        /**
        *   @name           viewEconomyController
        *   @function       Ver los registros facturados del mes
        */
        public function viewEconomyController() {

            $return = Query::viewEconomyModel('facturacion');

            foreach ($return as $row => $item) {

            echo '<tr>
                    <td>' . $item['mes'] . '</td>
                    <td>' . $item['anyo'] . '</td>
                    <td>' . $item['importefacturado'] . '</td>
                    <td>' . $item['importeinvertido'] . '</td>
                    <td class="center-text"><a href="index.php?do=economyedit&id='. $item["idfacturacion"] . '"><span class="fas fa-edit"></span></a></td>
                    <td class="center-text"><a href="index.php?do=economylist&deleteid='. $item["idfacturacion"] . '"><span class="fas fa-trash"></span></a></td>
                </tr>';

            }

        }

        /**
        *   @name           editEconomyController
        *   @function       Editar el mes que es mostrado segun su ID
        */
        public function editEconomyController() {

            $datacontroller = $_GET['id'];

            $return = Query::editEconomyModel($datacontroller, 'facturacion');

            echo '
            <input type="hidden" value="' . $return['idfacturacion'] . '" name="idupdate" id="idupdate" required>

            <div class="form-group row">
                <label for="monthupdate" class="col-sm-2 col-form-label">Mes:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="' . $return['mes'] . '" name="monthupdate" id="monthupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="anyoupdate" class="col-sm-2 col-form-label">Año:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="' . $return['anyo'] . '" name="anyoupdate" id="anyoupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="invoiceupdate" class="col-sm-2 col-form-label">Facturado:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="' . $return['importefacturado'] . '" name="invoiceupdate" id="invoiceupdate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="spendupdate" class="col-sm-2 col-form-label">Invertido:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" value="' . $return['importeinvertido'] . '" name="spendupdate" id="spendupdate" required>
                </div>
            </div>

            <button class="btn btn-primary btn-block" type="submit">Actualizar Mes</button>';

        }

        /**
        *   @name           updateEconomyController
        *   @function       Actualizar al usuario seleccionado segun su ID
        */
        public function updateEconomyController() {

            if(isset($_POST['idupdate'])) {

                $datacontroller = array('id'=>$_POST['idupdate'],
                                        'month'=>$_POST['monthupdate'],
                                        'anyo'=>$_POST['anyoupdate'],
                                        'invoice'=>$_POST['invoiceupdate'],
                                        'spend'=>$_POST['spendupdate']);

                $return = Query::updateEconomyModel($datacontroller, 'facturacion');

                if($return == "success") {

                   //header("location:index.php");
                   echo "El mes ha sido actualizado con éxito.";

                } else {

                    header("location:index.php");

                }

            }

        }

        /**
        *   @name           deleteEconomyController
        *   @function       Borrar el mes seleccionado segun su ID
        */
        public function deleteEconomyController() {

            if(isset($_GET['deleteid'])) {

                $datacontroller = $_GET['deleteid'];

                $return = Query::deleteEconomyModel($datacontroller, 'facturacion');

                if($return == 'success') {

                    header('location:economylist');

                }

            }

        }

    }
