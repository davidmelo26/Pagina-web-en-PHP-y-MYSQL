<h1>Registro</h1>


<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">

		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<div class="input-group">

				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="far fa-user"></i></i>
					</span>
				</div>
				<input type="text" class="form-control" id="nombre" name="registroNombre">
			</div>


		</div>

		<div class="form-group">
			<label for="email">Correo electrónico:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="far fa-envelope"></i>
					</span>
				</div>
				<input type="email" class="form-control" id="email" name="registroEmail">
			</div>

		</div>

		<div class="form-group">
			<label for="pwd">Contraseña:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fas fa-lock"></i>
					</span>
				</div>
				<input type="password" class="form-control" id="pwd" name="registroPassword">
			</div>
		</div>
		<?php

		/*=============================================
		=            FORMA EN COMO SE INSTACIA UN METODO NO ESTATICO           =
		=============================================*/
				
		// $registro = new ControladorFormularios();
		// $registro -> ctrRegistro();
		
		
		/*=====  End of FORMA EN COMO SE INSTACIA UN METODO NO ESTATICO  ======*/

		/*===================================
		=            SI ESTATICO            =
		===================================*/
		

		$registro = ControladorFormularios::ctrRegistro();

		if ($registro == "ok") {

			/* Para limpiar memoria cache del sitio */

			echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState(null, null, window.location.href);

				}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
		}
			/*=====  End of SI ESTATICO  ======*/


			?>

			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>

	</div>
