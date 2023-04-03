<?php
session_start();
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
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                <a class='navbar-brand' a href='../admin/panel_administrador.php'>Inicio</a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                  <span class='navbar-toggler-icon'></span>
                </button>

        <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <li class='nav-item active'>
                      <a class='nav-link' href='../admin/series_admin.php'>Series</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='../admin/películas_admin.php'>Películas</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='../admin/videojuegos_admin.php'>Videojuegos</a>
            </li>
             <li class='nav-item'>
              <a class='nav-link' href='../admin/libros_admin.php'>Libros</a>
            </li>
             <li class='nav-item'>
              <a class='nav-link' href='../admin/comics_admin.php'>Cómics</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='../admin/lista_usuarios.php'>Usuarios</a>
           </li>
           <li class='nav-item'>
             <a class='nav-link' href='../admin/reportes.php'>Reportes</a>
          </li>
            <li class='nav-item'>
             <a class='nav-link' href='cerrar_sesion.php'>Cerrar Sesión</a>
           </li>
          </ul>
        </div>
      </nav>


      <form action="#" method="POST" enctype="multipart/form-data">
        Insertar Nueva Serie <br>
        Foto <input type="file" name="foto"> <br><br>
        Nombre <input type="text" name="nombre"><br><br>
        Categoría <input type="text" name="categoria"><br><br>
        Descripcion <input type="textarea" name="descripcion"><br><br>
        Autor <input type="text" name="autor"><br><br>
        Fecha <input type="date" name="fecha"><br><br>
        Plataforma <input type="text" name="plataforma"><br><br>
        <input type="submit" name="enviar" value="Enviar">
      </form>

<?php
require_once("funciones.php");
require_once("../clases/clase_elementos.php");
$elemento = new Elementos;

if (isset($_POST['enviar'])) {

    $tmp = $_FILES['foto']['tmp_name'];
    $foto = $_FILES['foto']['name'];
    move_uploaded_file($tmp,"../../imagenes/elementos/$foto");

    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $autor = $_POST['autor'];
    $fecha = $_POST['fecha'];
    $plataforma = $_POST['plataforma'];
    $tipo = 'series';
    $activo = 1;


    $elemento->insertar_serie($foto,$nombre,$categoria,$descripcion,$autor,$fecha,$plataforma,$tipo,$activo);

}


 ?>

</div>
</div>

</div>

<a href = '../admin/series_admin.php'> Volver atrás </a>
<br>
<br>
<br>
<br>
<br>

<!-- <?php
footer();
?> -->
</body>
</html>
