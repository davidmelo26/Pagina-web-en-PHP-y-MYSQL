<?php 

/**
 * 
 */
class ControladorFormularios
{
	/*================================
	=            Registro            =
	================================*/
	
	static public function ctrRegistro()
	{
		if(isset($_POST['registroNombre'])){
	
			$tabla = "registros";

			$datos = array("nombre" => $_POST["registroNombre"],
							"email" => $_POST["registroEmail"],
							"password" => $_POST["registroPassword"]);

			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

			return $respuesta;

		}
	}
	
	/*=====  End of Registro  ======*/
	/*=============================================
	=            Seleccionar registros            =
	=============================================*/
	
	static public function crtSeleccionarRegistros($item, $valor){

		$tabla = "registros";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
	}
	/*=====  End of Seleccionar registros  ======*/
	/*===============================
	=            INGRESO            =
	===============================*/
	
	public function ctrIngreso()
	{
		if(isset($_POST["ingresoEmail"])){
			$tabla = "registros";
			$item = "email";
			$valor = $_POST['ingresoEmail'];
			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
			// echo '<pre>'; print_r($respuesta); echo '</pre>';

			if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"])
			{
				$_SESSION['validarIngreso'] = "ok";

				echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState(null, null, window.location.href);
				}
				window.location = "index.php?pagina=inicio";
				</script>';

				// echo '<div class="alert alert-danger">Error al ingresar, coreo electrónico o contraseña no coinciden</div>';
			}else{
				echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState(null, null, window.location.href);
				}
				</script>';

				echo '<div class="alert alert-danger">Error al ingresar, coreo electrónico o contraseña no coinciden</div>';
			}
		}
	}
	/*=====  End of INGRESO  ======*/
	/*===========================================
	=            Actualizar registro            =
	===========================================*/
	static public function ctrActualizarRegistro(){
		
		if(isset($_POST['actualizarNombre'])){

			if($_POST['actualizarPassword'] != "" ){
				$password = $_POST['actualizarPassword'];
			}else{
				$password = $_POST['passwordActual'];
			}
			
			$tabla = "registros";

			$datos = array("id" => $_POST['idUsuario'], 
							"nombre" => $_POST["actualizarNombre"],
							"email" => $_POST["actualizarEmail"],
							"password" => $password);

			$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

			return $respuesta;
		}
	}
	/*=====  End of Actualizar registro  ======*/
	/*=========================================
	=            Eliminar Registro            =
	=========================================*/
	static public function ctrEliminarRegistro(){
		if(isset($_POST['eliminarRegistro'])){

			$tabla = "registros";
			$valor = $_POST['eliminarRegistro'];

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			if($respuesta == "ok"){

				echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState(null, null, window.location.href);
				}
				window.location = "index.php?pagina=inicio";

				</script>';
			}

		}
	}
	/*=====  End of Eliminar Registro  ======*/
	
	
}

?>