<?php
	session_start();
	include('../funciones/funciones.php');
?>
<!DOCTYPE html>
<html lang='es' dir='ltr'>
  <head>
    <meta charset='utf-8'>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
		<div class='container-fluid'>
			<nav class='navbar navbar-expand-lg navbar-light bg-light'>
					<a class='navbar-brand' a href='../../index.php'>Inicio</a>
					<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
						<span class='navbar-toggler-icon'></span>
					</button>
					<div class='collapse navbar-collapse' id='navbarNav'>
						<ul class='navbar-nav'>
							<li class='nav-item active'>
												<a class='nav-link' href='../usuarios/series.php'>Series</a>
							</li>
							<li class='nav-item'>
								<a class='nav-link' href='../usuarios/películas.php'>Películas</a>
							</li>
							<li class='nav-item'>
								<a class='nav-link' href='../usuarios/videojuegos.php'>Videojuegos</a>
							</li>
							 <li class='nav-item'>
								<a class='nav-link' href='../usuarios/libros.php'>Libros</a>
							</li>
							 <li class='nav-item'>
								<a class='nav-link' href='../usuarios/comics.php'>Cómics</a>
							</li>
							<li class='nav-item'>
							 <a class='nav-link' href='iniciar_sesion.php'>Iniciar Sesión</a>
						 </li>
						 <li class='nav-item'>
							<a class='nav-link' href='#'>Registrarse</a>
						</li>
						</ul>
					</div>
				</nav>


<div class='container formulario-de-registro'>
<form id='register-form' action='registro.php' method='post' enctype="multipart/form-data">
  <div class='form-group'>
    Nombre <input type='text' name='nombre' id='usuario' tabindex='1' class='form-control' placeholder='Usuario' value=''>
  </div>
	<div class='form-group'>
    Nombre de usuario <input type='text' name='usuario' id='usuario' tabindex='1' class='form-control' placeholder='Usuario' value=''>
  </div>
	<div class='form-group'>
    Contraseña <input type='password' name='contrasena' id='password' tabindex='2' class='form-control' placeholder='Contraseña'>
  </div>
  <div class='form-group'>
    <input type='date' name='fecha_nacimiento' id='fecha_nacimiento' tabindex='1' class='form-control' placeholder='Fecha de Nacimiento' value=''>
  </div>


  <div class='form-group'>
    <div class='row'>
      <div class='col-sm-6 col-sm-offset-3'>
        <input type='submit' name='enviar' id='register-submit' tabindex='4' class='form-control btn btn-register' value='Crear cuenta'>
      </div>
    </div>
  </div>
</form>
</div>

<br>
<br>
<br>

<?php
		footer();
?>

</div>
  </body>
</html>
