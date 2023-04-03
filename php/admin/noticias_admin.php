<?php
session_start();
?>

<?php
require_once("../funciones/funciones.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../../js/app.js" defer></script>
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



							echo "

							<div class='mt-5 container-fluid'>
							<input type='button' class='btn btn-primary' id='descargar' value='Ver noticias'>

        <div id='App' class='justify-content-center row'>

            <div class='col-md-10'>
			    <table  class='table text-center table-hover'>
				<thead>
                <tr>
				  <th>Titulo</th>
				  <th>Imagen</th>
                  <th>Enlace</th>
				</tr>
                <thead>
				<tbody id='lista_api'>

                </tbody>
				</table>
			</div>



        </div>";



            }
            else{
              menu_admin();
							echo "

							<div class='mt-5 container-fluid'>
							<input type='button' class='btn btn-primary' id='descargar' value='Ver noticias'>
        <div id='App' class='justify-content-center row'>

            <div class='col-md-10'>
			    <table  class='table text-center table-hover'>
				<thead>
                <tr>
				  <th>Titulo</th>
				  <th>Imagen</th>
                  <th>Enlace</th>
				</tr>
                <thead>
				<tbody id='lista_api'>

                </tbody>
				</table>
			</div>



        </div>";


            }
            ?>
        </div>
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
