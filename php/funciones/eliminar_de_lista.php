<?php
  session_start();
  require_once("funciones.php");
  require_once("../clases/clase_favoritos.php");

  $favoritos = new Favoritos;

  $id_usuario = $_SESSION['id'];
  $id_elemento = $_GET['id'];
  $pagina = $_GET['page'];

  $favoritos->eliminar_de_lista($id_usuario,$id_elemento);

  header("location:../usuarios/mi_lista.php");


 ?>
