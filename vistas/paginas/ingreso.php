<h1>Ingreso</h1>

<div class="d-flex justify-content-center text-center">
	<form class="p-5 bg-light" method="post">

		<div class="form-group">
			<label for="email">Correo electrónico:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="far fa-envelope"></i>
					</span>
				</div>
				<input type="email" class="form-control" id="email" name="ingresoEmail">
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
				<input type="password" class="form-control" id="pwd" name="ingresoPassword">
			</div>
		</div>
		<?php

		/*===================================
		=            SI ESTATICO            =
		===================================*/

		$ingreso = new ControladorFormularios();
		$ingreso->ctrIngreso();


		/*=====  End of SI ESTATICO  ======*/


			?>

			<button type="submit" class="btn btn-primary">Ingresar</button>
		</form>

	</div>