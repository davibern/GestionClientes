<?php

    /*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: clase maestra de clientes (añadir, modificar, consultar)
    */

    if(!class_exists('Conexion')) {

        include("includes/conexion.php");

    }
        
    class Constumer extends Conexion {

        // Constructor de la superclase
        function __construct() {

            parent::__construct();

         }

        // Método para crear a un cliente nuevo
        public function SetNewConstumer($data) {

            // Try and catch para capturar errores
            try {

                // Comprobamos que los datos no estén vacíos
                if(empty($data)) {

                    echo "Hay campos vacíos, no se puede crear al cliente nuevo.";

                } else {

                    // Guardamos la setencia SQL en la variable $sql
                    $sql = "INSERT INTO clientes (nombre,
                                                    alias,
                                                    movil,
                                                    direccion,
                                                    poblacion,
                                                    provincia,
                                                    codigopostal,
                                                    tratamientocapilar,
                                                    tratamientocorporal,
                                                    observaciones,
                                                    creadopor,
                                                    fechacreacion) values (?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?,
                                                                            ?)";

                }

                // Guardamos la variable $sql para prepararla para la sentencia PDO
                $query = $this->conexion_db->prepare($sql);

                // Ligamos parámetros marcadores (?,?,?, es decir, cada posición del arreglo con la variable que le corresponde que se recoge de los inputs del formulario)
                // Especificación de tipos de caracteres
                // i->la variable correspondiente es de tipo entero
                // d->la variable correspondiente es de tipo double
                // s->la variable correspondiente es de tipo string
                // b->la variable correspondiente es un blob y se envía en paquetes

                $query->bindParam(1, $data['nombre'], PDO::PARAM_STR);
                $query->bindParam(2, $data['alias'], PDO::PARAM_STR);
                $query->bindParam(3, $data['movil'], PDO::PARAM_STR);
                $query->bindParam(4, $data['direccion'], PDO::PARAM_STR);
                $query->bindParam(5, $data['poblacion'], PDO::PARAM_STR);
                $query->bindParam(6, $data['provincia'], PDO::PARAM_STR);
                $query->bindParam(7, $data['codigopostal'], PDO::PARAM_STR);
                $query->bindParam(8, $data['tratamientocapilar'], PDO::PARAM_STR);
                $query->bindParam(9, $data['tratamientocorporal'], PDO::PARAM_STR);
                $query->bindParam(10, $data['observaciones'], PDO::PARAM_STR);
                $query->bindParam(11, $data['usuario'], PDO::PARAM_STR);
                $query->bindParam(12, $data['fecha'], PDO::PARAM_STR);

                // Ejecutamos la consulta
                $query->execute();

                // Guardamos la consulta en una variable
                $result = $query;

                // Cerramos la query
                $query->closeCursor();

                // Devolvemos los resultados a la función
                return $result;

                // Vaciamos el objeto de conexion
                $this->conexion_db = null;

            } catch (Exception $e) {

                echo "Error en la ejecución de la consulta<br>";
                echo "Mensaje: " . $e->GetMessage() . "<br>";
                echo "Línea: " . $e->getLine();

            }

        }

        // Método para guardar las modificaciones del cliente
        public function SetConstumer($data) {
            
            // try and catch para capturar errores
            try {
        
                // Comprobamos que los campos no están vacíos
                if(empty($data)){
        
                    echo "Los campos están vacíos, no se puede actualizar.";
        
                } else {
        
                        // Si no están vacíos guardamos en la variable sql la sentencia de actualización
                        $sql = "UPDATE clientes SET
                                    nombre = ?,
                                    alias = ?,
                                    movil = ?,
                                    direccion = ?,
                                    poblacion = ?,
                                    provincia = ?,
                                    codigopostal = ?,
                                    tratamientocapilar = ?,
                                    tratamientocorporal = ?,
                                    observaciones = ?,
                                    modificadopor = ?,
                                    fechamodificacion = ?
                                WHERE idclientes = ?";
                }
        
                    // Guardamos la variable SQL y preparamos la consulta con la conexion de la base de datos
                    $query = $this->conexion_db->prepare($sql);
        
                    // Ligamos parámetros marcadores (?,?,?,... es decir, cada posición del arreglo con la variable que le corresponde que se recoge de los inputs del formulario)
                    // Especificación de tipos de caracteres
                    // i->la variable correspondiente es de tipo entero
                    // d->la variable correspondiente es de tipo double
                    // s->la variable correspondiente es de tipo string
                    // b->la variable correspondiente es un blob y se envía en paquetes
        
                    $query->bindParam(1, $data['nombre'], PDO::PARAM_STR);
                    $query->bindParam(2, $data['alias'], PDO::PARAM_STR);
                    $query->bindParam(3, $data['movil'], PDO::PARAM_STR);
                    $query->bindParam(4, $data['direccion'], PDO::PARAM_STR);
                    $query->bindParam(5, $data['poblacion'], PDO::PARAM_STR);
                    $query->bindParam(6, $data['provincia'], PDO::PARAM_STR);
                    $query->bindParam(7, $data['codigopostal'], PDO::PARAM_STR);
                    $query->bindParam(8, $data['tratamientocapilar'], PDO::PARAM_STR);
                    $query->bindParam(9, $data['tratamientocorporal'], PDO::PARAM_STR);
                    $query->bindParam(10, $data['observaciones'], PDO::PARAM_STR);
                    $query->bindParam(11, $data['usuario'], PDO::PARAM_STR);
                    $query->bindParam(12, $data['fecha'], PDO::PARAM_STR);
                    $query->bindParam(13, $data['idcliente'], PDO::PARAM_STR);
                    
                    // Ejecutamos la consulta
                    $query->execute();
        
                    // Guardamos el resultado en una variable
                    $result = $query;
        
                    // Cerramos la query
                    $query->closeCursor();
        
                    // Devolvemos los resultados a la función
                    return $result;
        
                    // Vaciamos el objeto
                    $this->conexion_db = null;
        
                } catch (Exception $e) {
        
                echo "Error en la ejecución de la consulta<br>";
                echo "Mensaje: " . $e->GetMessage() . "<br>";
                echo "Línea: " . $e->getLine();
        
            }
            
        }

      // Método para editar el cliente que tenga el valor en $idclientes
      public function EditClient($id) {
        
        try {

            // Sentencia SQl
            $sql = 'SELECT * FROM clientes WHERE idclientes = "' . $id . '"';

            // Guardamos la variable SQL usando la conexion de $conexion_db de la clase Conexion con el método prepare PDO
            $query = $this->conexion_db->prepare($sql);

            // Guardamos el registro en un array
            $query->execute(array());

            // Preparamos el array con datos asociativos
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // Cerramos la query
            $query->closeCursor();

            // Devolvemos los resultaodos de la función
            return $result;

            // Vaciamos el objeto de la conexion_db
            $this->conexion_db = null;

        } catch (Exception $e) {

            // Si hubiera algún error lo mostramos usando el método GetMessage y getLine
            echo "Error: " . $e->GetMessage() . "<br>Línea: " . $e->getLine();

        }

      }

      // Método para consultar todos los clientes
      public function getAllClients(){
		
		$sql = 'SELECT * FROM clientes';
		
		$query = $this->conexion_db->prepare($sql);
		
		$query->execute(array());
		
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		
		$query->closeCursor();
		
		return $result;
		
		$this->conexion_db = null;
		
      }
      
      // Método para consultar todos los clientes por el alias
      public function getClientesAlias($alias){
		
		$sql = 'SELECT * FROM clientes WHERE alias = "' . $alias . '"';
		
		$query = $this->conexion_db->prepare($sql);
		
		$query->execute(array());
		
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		
		$query->closeCursor();
		
		return $result;
		
		$this->conexion_db = null;
		
      }
      
      // Método para consultar todos los clientes por el teléfono
      public function getClientesPhone($number){
		
		$sql = 'SELECT * FROM clientes WHERE movil = "' . $number . '"';
	
		$query = $this->conexion_db->prepare($sql);
		
		$query->execute(array());
		
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		
		$query->closeCursor();
		
		return $result;
		
		$this->conexion_db = null;
		
      }
      
      // Método para consultar todos los clientes por el teléfono y alias
      public function getClientesAliasPhone($alias, $number){
		
		$sql = 'SELECT * FROM clientes WHERE alias = "' . $alias . '" AND movil = "' . $number . '"';
		
		$query = $this->conexion_db->prepare($sql);
		
		$query->execute(array());
		
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		
		$query->closeCursor();
		
		return $result;
		
		$this->conexion_db = null;
		
      }
      
      // Método para consultar todos los clientes por la inicial del alias
      public function getClientsInitialAlias($initialalias){
		
		$sql = 'SELECT * FROM clientes WHERE alias LIKE "' . $initialalias . '%"';
		
		$query = $this->conexion_db->prepare($sql);
		
		$query->execute(array());
		
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		
		$query->closeCursor();
		
		return $result;
		
		$this->conexon_db = null;
		
      }

      // Método para consultar el número de páginas
      public function getPages(){
		
		$sql = 'SELECT COUNT(*) FROM clientes';
		
		$sentencia = $this->conexion_db->prepare($sql);
		
		$sentencia->execute();
		
		$resultado = $sentencia->fetchColumn();
		
		$sentencia->closeCursor();
		
		$this->totalpaginas = ceil($resultado/$this->cantidadpaginas);
		
		return $resultado . " clientes en total. Página " . $this->pagina . " de " . $this->totalpaginas;
		
		$this->conexion_db = null;
		
	  }

    }

?>