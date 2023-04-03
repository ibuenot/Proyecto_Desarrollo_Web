<?php
session_start();
?>

<?php
require_once("../funciones/funciones.php");
require_once("../clases/clase_elementos.php");

$conexion=ConectarBD();


$elemento = new Elementos;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container-fluid">

      <!---Menu----->
      <div class="row">
        <div class="col-12">
          <?php
            if (!isset($_SESSION['usuario'])){
              echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
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
        								<a class='nav-link' href='../usuarios/peliculas.php'>Películas</a>
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
        							<a class='nav-link' href='registrarse.php'>Registrarse</a>
        						</li>
        						</ul>
        					</div>
        				</nav>";

              $buscar = $_GET['buscar'];

              echo "<div class='row'>";
                    $elemento->buscar_comic($buscar);
      	    echo "</div>";

            }
            else{
              echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>
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
        							 	<a class='nav-link' href='../usuarios/mis_datos.php'>Mis Datos</a>
        						 </li>
       								<li class='nav-item'>
       								 <a class='nav-link' href='cerrar_sesion.php'>Cerrar Sesión</a>
       							 </li>
                    </ul>
                  </div>
                </nav>";
              $buscar = $_GET['buscar'];


              echo "<br>";

              echo "<div class='row'>";

                $elemento->buscar_comic($buscar);
      	    echo "</div>";

            }
            ?>
        </div>
      </div>




</div>
  </body>
</html>
