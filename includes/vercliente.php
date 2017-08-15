<?php


/*
        Autor: David Bernabé
        E-mail: david.bern.pal@gmail.com
        Función: consultas de clientes contra la base de datos
        Licencia: Apache License 2.0 || http://www.apache.org/licenses/LICENSE-2.0

        Función: clase padre que busca los datos de los clientes por alias o por número de móvil
*/


// Incluimos sólo la clase conexión si no existe
if(!class_exists('Conexion')) {
	
	
	include("includes/conexion.php");
	
	
}


class DevuelveClientes extends Conexion{
	
	
	public function __construct(){
		
		
		parent::__construct();
		
		
	}
	
	
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
	
	
	public function getAllClients(){
		
		
		$sql = 'SELECT * FROM clientes';
		
		
		$sentencia = $this->conexion_db->prepare($sql);
		
		
		$sentencia->execute(array());
		
		
		$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
		
		
		$sentencia->closeCursor();
		
		
		return $resultado;
		
		
		$this->conexion_db = null;
		
		
	}
	
	
	public function getClientesAlias($alias){
		
		
		$sql = 'SELECT * FROM clientes WHERE alias = "' . $alias . '"';
		
		
		$sentencia = $this->conexion_db->prepare($sql);
		
		
		$sentencia->execute(array());
		
		
		$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
		
		
		$sentencia->closeCursor();
		
		
		return $resultado;
		
		
		$this->conexion_db = null;
		
		
	}
	
	
	public function getClientesPhone($number){
		
		
		$sql = 'SELECT * FROM clientes WHERE movil = "' . $number . '"';
		
		
		$sentencia = $this->conexion_db->prepare($sql);
		
		
		$sentencia->execute(array());
		
		
		$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
		
		
		$sentencia->closeCursor();
		
		
		return $resultado;
		
		
		$this->conexion_db = null;
		
		
	}
	
	
	public function getClientesAliasPhone($alias, $number){
		
		
		$sql = 'SELECT * FROM clientes WHERE alias = "' . $alias . '" AND movil = "' . $number . '"';
		
		
		$sentencia = $this->conexion_db->prepare($sql);
		
		
		$sentencia->execute(array());
		
		
		$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
		
		
		$sentencia->closeCursor();
		
		
		return $resultado;
		
		
		$this->conexion_db = null;
		
	}
	
	
	public function getClientsInitialAlias($initialalias){
		
		
		$sql = 'SELECT * FROM clientes WHERE alias LIKE "' . $initialalias . '%"';
		
		
		$sentencia = $this->conexion_db->prepare($sql);
		
		
		$sentencia->execute(array());
		
		
		$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
		
		
		$sentencia->closeCursor();
		
		
		return $resultado;
		
		
		$this->conexon_db = null;
		
		
	}
	
	
}

?>
