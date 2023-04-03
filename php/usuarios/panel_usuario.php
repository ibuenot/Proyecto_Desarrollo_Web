<?php
	session_start();

	require_once("../funciones/funciones.php");
	include("../clases/clase_votaciones.php");
	$votaciones = new Votaciones;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
  <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>


	<?php

		carousel_user();
		menu_usuario();

		usuario_verificado();


	?>
	<div class="container-fluid">
					<br>
		      <br>

		      <!---Muestra las tres series más votadas--->
		      <div class='container-fluid'>
		         <div class="row tres_elementos_titulo">
			          <div class="col-12">
			              <h3>Series más votadas</h3>
			          </div>
		        </div>
		    </div>
		    <br>
		    <div class="row">
					<div class="col-12 ">
		      <?php
		        $votaciones->tres_series_mas_votadas_usuarios();
		       ?>
				 </div>
		    </div>

				<!---Muestra las tres películas más votadas--->
				<div class='container-fluid'>
					 <div class="row tres_elementos_titulo">
							<div class="col-12">
									<h3>Películas más votadas</h3>
							</div>
					</div>
			</div>
			<br>
			<div class="row">
				<div class="col-12 ">
				<?php
					$votaciones->tres_peliculas_mas_votadas_usuarios();
				 ?>
			 </div>
			</div>

			<!---Muestra los tres videojuegos más votados--->
			<div class='container-fluid'>
				 <div class="row tres_elementos_titulo">
						<div class="col-12">
								<h3>Videojuegos más votados</h3>
						</div>
				</div>
		</div>
		<br>
		<div class="row">
			<div class="col-12 ">
			<?php
				$votaciones->tres_videojuegos_mas_votados_usuarios();
			 ?>
		 </div>
		</div>
		<!---Muestra los tres libros más votados--->
		<div class='container-fluid'>
			 <div class="row tres_elementos_titulo">
					<div class="col-12">
							<h3>Libros más votados</h3>
					</div>
			</div>
	</div>
	<br>
	<div class="row">
		<div class="col-12 ">
		<?php
			$votaciones->tres_libros_mas_votados_usuarios();
		 ?>
	 </div>
	</div>

	<!---Muestra los tres comics más votados--->
	<div class='container-fluid'>
		 <div class="row tres_elementos_titulo">
				<div class="col-12">
						<h3>Comics más votados</h3>
				</div>
		</div>
	</div>
	<br>
	<div class="row">
	<div class="col-12 ">
	<?php
		$votaciones->tres_comics_mas_votados_usuarios();
	 ?>
	</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php
	    footer();
	?>



	</div>

</body>
</html>
