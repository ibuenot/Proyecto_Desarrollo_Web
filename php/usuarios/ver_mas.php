<?php
session_start();
?>

<?php
require_once("../funciones/funciones.php");
require_once("../clases/clase_elementos.php");
require_once("../clases/clase_comentarios.php");

$conexion=ConectarBD();


$elemento = new Elementos;
$comentarios = new Comentarios;
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
              menu_no_identificado();

              $id_elemento=$_GET['id'];

              $pagina = $_GET['page'];

              echo "<br>";


              $elemento->ver_mas($id_elemento);
              $comentarios->ver_comentarios_no_identificado($id_elemento);


            echo "<div class='row'>
                    <div class='col-md-12 text-center'>
                      <a href='series.php?page=$pagina'>Volver atrás</a>
                    </div>
                  </div>";
            }
            else{
              menu_usuario();
              $id_elemento=$_GET['id'];


              echo "<br>";

              


              $elemento->ver_mas($id_elemento);
              $comentarios->ver_comentarios_identificado($id_elemento);


            echo "<div class='row'>
                    <div class='col-md-12 text-center'>
                      <a href='series.php'>Volver atrás</a>
                    </div>
                  </div>";

            }
            ?>


        </div>
      </div>

</div>

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
