<?php 

require_once "conexion.php";

class ModeloFormularios{

	/*================================
	=            Registro            =
	================================*/
	
	static public function mdlRegistro($tabla, $datos){

		#statement: declaracion
		#prepare(): Prepara una sentencia SQL para ser ejecutada por el metodo PDOStatement::execute(). La sentencia SQL puede contener cero o mas marcadores de parametros con nombre (:name) o signos de interrogacion (?) por los cuales los valores reales seran sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminado la necesidad de entrecomillar manualmente los parametros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

		#bindparam: Vincula una variable de PHP a un parametro de sustitucion con nombre o de signo de interrogacion correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		//esta es la sintaxis para subir datos en la base de datos

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}
		$stmt->close();

		$stmt = null;
	}
	/*=====  End of Registro  ======*/
	/*=============================================
	=            Seleccionar registros            =
	=============================================*/
	static public function mdlSeleccionarRegistros($tabla, $item, $valor)
	{
		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");

			$stmt->execute();
			#fetchAll: Devuelve todos los registros de la tabla
			return $stmt -> fetchAll();

		}else{
			$stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();
			#fetchA: Devuelve un solo registro de la tabla
			return $stmt -> fetch();

		}

		$stmt->close();
		$stmt = null;
	}
	
	
	/*=====  End of Seleccionar registros  ======*/
	
	/*================================
	=            Actualizar Registro            =
	================================*/
	
	static public function mdlActualizarRegistro($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `nombre`=:nombre,`email`=:email,`password`=:password WHERE `id`=:id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		//esta es la sintaxis para subir datos en la base de datos

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}
		$stmt->close();

		$stmt = null;
	}
	/*=====  End of Actualizar Registros  ======*/
	/*=========================================
	=            Eliminar Registro            =
	=========================================*/
	static public function mdlEliminarRegistro($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $valor, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}
		$stmt->close();

		$stmt = null;
	}
		
	/*=====  End of Eliminar Registro  ======*/
		
	
}


 ?>