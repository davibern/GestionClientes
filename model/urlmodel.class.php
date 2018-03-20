<?php

    /**
    *  Clase que contiene una lista blanca de paginas que el usuario puede visitar
    *
    * @author       Davidbp.com
    * @git 	    	https://github.com/DavidBPCode/GestionClientes
    * @version      3.0.1803
    * @created      03/03/2018
    * @modified     -
    * @function     Listado de paginas accesibles para su navegacion. Si el usuario intenta acceder a una pagina que no este en la lista blanca lo devolvera
    *               al index
    *
    */

    class UrlModel {
    
        /**
        *   @name           getUrlModel
        *   @function       Se devuelve una pagina visible para la navegacion
        */
        public static function getUrlModel($url) {

            # Se recibe el valor que proviene de $url y a su vez de $_GET['do'] de la funcion del controlador getUrlController()
            if($url == 'login' || $url == 'customers' || $url == 'userregister' || $url == 'economy' ||
              $url == 'signout' || $url == 'users' || $url == 'userslist' || $url == 'useredit' || 
              $url == 'customerslist' || $url == 'customeredit' || $url == 'customerregister' || $url == 'economy' ||
              $url == 'economyregister' || $url == 'economylist' || $url == 'economyedit' || $url == "about") {

                # Con el valor de cada seccion se cambia luego a cada archivo con su respectivo nombre del tema
                $module = 'view/theme-basic/theme.nav.' . $url . '.php';

            } else if($url == 'index') {

                $module = 'view/theme-basic/theme.index.php';

            } else if($url == 'updated') {

                $module = 'view/theme-basic/theme.nav.userslist.php';

            } else if($url == 'updatedcustomer') {

                $module = 'view/theme-basic/theme.nav.customerslist.php';

            } else if($url == 'errorlogin') {

                $module = "view/theme-basic/theme.nav.login.php";

            } else if($url == 'committed') {

                $module = "view/theme-basic/theme.nav.userregister.php";

            } else {

                # Si la pagina no existe que lo lleve al index
                $module = 'view/theme-basic/theme.index.php';

            }

            return $module;

        }

    }