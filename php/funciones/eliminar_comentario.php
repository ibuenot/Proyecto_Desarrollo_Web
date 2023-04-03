<?php
  session_start();
  require_once("funciones.php");
  require_once("../clases/clase_reportes.php");

  $reportes = new Reportes;

  $id_comentario = $_GET['id'];

  $reportes->eliminar_comentario_reportado($id_comentario);

  header("location:../admin/reportes.php");


 ?>
