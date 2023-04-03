<?php
session_start();
?>

<?php
require_once("../funciones/funciones.php");
require_once("../clases/clase_usuarios.php");

$conexion=ConectarBD();


$usuarios = new Usuarios;

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
              header("location:../funciones/iniciar_sesion.php");
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



            }
            ?>

            <form class="" action="#" method="post" enctype="multipart/form-data">
              Nueva Foto de Perfil <br>
              <input type='file' name="foto"> <br><br>
              <input type="submit" name="enviar" value="Cambiar">
            </form>

            <?php

            $id_usuario = $_SESSION['id'];

            if (isset($_POST['enviar'])) {

                $tmp = $_FILES['foto']['tmp_name'];
                $foto = $_FILES['foto']['name'];
                $ruta = "../../imagenes/usuarios/";
                move_uploaded_file($tmp,"../../imagenes/usuarios/$foto");
                $usuarios->modificar_foto_de_perfil($id_usuario,$foto);

            }

            ?>
        </div>
      </div>

</div>
<a href="../usuarios/mis_datos.php">Volver</a>
<br>

<?php
    footer();
?>
  </body>
</html>
