<?php

//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

//Conexión a la base de datos
	function ConectarBD(){
		$conexion = new mysqli("localhost","root","","proyecto_web");
		$conexion->set_charset("utf8");

		return $conexion;
	}

//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

//Menú del usuario no identificado
function menu_no_identificado(){
	echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
				<a class='navbar-brand' a href='../../index.php'>Inicio</a>
				<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
					<span class='navbar-toggler-icon'></span>
				</button>
				<div class='collapse navbar-collapse' id='navbarNav'>
					<ul class='navbar-nav'>
						<li class='nav-item active'>
											<a class='nav-link' href='././series.php'>Series</a>
						</li>
						<li class='nav-item'>
							<a class='nav-link' href='././peliculas.php'>Películas</a>
						</li>
						<li class='nav-item'>
							<a class='nav-link' href='./././videojuegos.php'>Videojuegos</a>
						</li>
						 <li class='nav-item'>
							<a class='nav-link' href='././libros.php'>Libros</a>
						</li>
						 <li class='nav-item'>
							<a class='nav-link' href='././comics.php'>Cómics</a>
						</li>
						</li>
						 <li class='nav-item'>
							<a class='nav-link' href='././noticias.php'>Noticias</a>
						</li>
						<li class='nav-item'>
						 <a class='nav-link' href='../funciones/iniciar_sesion.php'>Iniciar Sesión</a>
					 </li>
					 <li class='nav-item'>
						<a class='nav-link' href='../funciones/registrarse.php'>Registrarse</a>
					</li>
					</ul>
				</div>
			</nav>";
}

//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

//Menú del usuario
		function menu_usuario(){
			echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
						<a class='navbar-brand' href='panel_usuario.php'>Inicio</a>
						<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
							<span class='navbar-toggler-icon'></span>
						</button>
						<div class='collapse navbar-collapse' id='navbarNav'>
							<ul class='navbar-nav'>

								<li class='nav-item active'>
									<a class='nav-link' href='series.php'>Series</a>
								</li>
								<li class='nav-item'>
									<a class='nav-link' href='peliculas.php'>Películas</a>
								</li>
								<li class='nav-item'>
									<a class='nav-link' href='videojuegos.php'>Videojuegos</a>
								</li>
								 <li class='nav-item'>
									<a class='nav-link' href='libros.php'>Libros</a>
								</li>
								 <li class='nav-item'>
									<a class='nav-link' href='comics.php'>Cómics</a>
								</li>
								<li class='nav-item'>
								 <a class='nav-link' href='noticias.php'>Noticias</a>
							 </li>
								<li class='nav-item'>
								 <a class='nav-link' href='mi_lista.php'>Mi Lista</a>
							 </li>
							 <li class='nav-item'>
 							 	<a class='nav-link' href='mis_datos.php'>Mis Datos</a>
 						 </li>

								<li class='nav-item'>
								 <a class='nav-link' href='../funciones/cerrar_sesion.php'>Cerrar Sesión</a>
							 </li>
							</ul>
						</div>
					</nav>";
		}

//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

//Menú del Administrador
	function menu_admin(){
		echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
				  <a class='navbar-brand' href='panel_administrador.php'>Inicio</a>
				  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
				    <span class='navbar-toggler-icon'></span>
				  </button>
				  <div class='collapse navbar-collapse' id='navbarNav'>
				    <ul class='navbar-nav'>

						<li class='nav-item active'>
							<a class='nav-link' href='series_admin.php'>Series</a>
						</li>
						<li class='nav-item'>
							<a class='nav-link' href='peliculas_admin.php'>Películas</a>
						</li>
						<li class='nav-item'>
							<a class='nav-link' href='videojuegos_admin.php'>Videojuegos</a>
						</li>
						 <li class='nav-item'>
							<a class='nav-link' href='libros_admin.php'>Libros</a>
						</li>
						 <li class='nav-item'>
							<a class='nav-link' href='comics_admin.php'>Cómics</a>
						</li>
						<li class='nav-item'>
						 <a class='nav-link' href='noticias_admin.php'>Noticias</a>
					 </li>
						<li class='nav-item'>
						 <a class='nav-link' href='lista_usuarios.php'>Usuarios</a>
						</li>
						<li class='nav-item'>
						 <a class='nav-link' href='reportes.php'>Reportes</a>
					  </li>
				   	<li class='nav-item'>
				        <a class='nav-link' href='../funciones/cerrar_sesion.php'>Cerrar Sesión</a>
				    </li>
				    </ul>
				  </div>
				</nav>";
	}


//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

//Inicio de Sesión

function inicio_sesion($array){

		$conexion = ConectarBD();

		$usuario = $array['usuario'];
		$pass = $array['pass'];
		$pass_codificado = md5(md5($pass));


		$consulta = "SELECT id,activo,usuario,contrasena FROM usuarios where usuario='$usuario' AND contrasena = '$pass_codificado'";
		$datos = $conexion->query($consulta);
		if($datos->num_rows>0)
		{
					$fila = $datos->fetch_array(MYSQLI_ASSOC);

					if ($fila["activo"]==0) {
						echo "Su usuario está desactivado";
						header("index.php");
					}
					else{
					//MARCADA LA CASILLA
							if ($fila['id']>0) {

								$_SESSION['id']= $fila['id'];
								$_SESSION['usuario']=$array['usuario'];

								if(isset($array['sesion_abierta'])){
										$datos = session_encode();
										setcookie("sesion",$datos,time()*60);
									}
								header("location:../usuarios/panel_usuario.php");
							}
							elseif($fila['id']==0){

										$_SESSION['id']= $fila['id'];
										$_SESSION['usuario']= "admin";

										if(isset($array['sesion_abierta']))
										{
											$datos = session_encode();
											setcookie("sesion",$datos,time()*60);
										}
										header("location:../admin/panel_administrador.php");
							}
						}
				}
				else {
					echo "usuario o contraseña incorrectos";
				}
}

//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

	function comprobar_sesion($sitio){
		if (isset($_COOKIE['sesion'])) {
		session_decode($_COOKIE['sesion']);
		}

		if (isset($_SESSION['usuario'])) {
			if($sitio == 'i'){
				header("location:/php/pagina_principal.php");
			}

			else{
				header("location:pagina_principal.php");
			}

		}
		elseif(isset($_SESSION['admin'])){
				if($sitio == 'i')
				header("location:/php/panel_administrador.php");
			else
				header("location:panel_administrador.php");
		}

	}

//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------


	function usuario_verificado(){
		if (isset($_COOKIE['sesion'])) {

			session_decode($_COOKIE['sesion']);
			echo "Bienvenido $_SESSION[usuario]";
		}
	}

//------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------

function carousel(){
	echo "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
      <img class='d-block w-100' src='././imagenes/web/1.jpg' alt='First slide'>
    </div>
    <div class='carousel-item'>
      <img class='d-block w-100' src='././imagenes/web/2.jpg' alt='Second slide'>
    </div>
    <div class='carousel-item'>
      <img class='d-block w-100' src='././imagenes/web/3.jpg' alt='Third slide'>
    </div>
  </div>
  <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
  </a>
  <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
  </a>
</div>";
}
function carousel_user(){
	echo "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <div class='carousel-item active'>
      <img class='d-block w-100' src='../../imagenes/web/1.jpg' alt='First slide'>
    </div>
    <div class='carousel-item'>
      <img class='d-block w-100' src='../../imagenes/web/2.jpg' alt='Second slide'>
    </div>
    <div class='carousel-item'>
      <img class='d-block w-100' src='../../imagenes/web/3.jpg' alt='Third slide'>
    </div>
  </div>
  <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
  </a>
  <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
  </a>
</div>";
}


function footer(){
	echo "<div class='container-fluid fixed-bottom' style='background-color:lightblue'>
	<div class='row'>
			<div class='col-md-12'>
					<span>SPVLC.com </span>
			</div>
		</div>
		<br>";

}









?>
