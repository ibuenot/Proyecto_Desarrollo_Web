<?php
  session_start();
  require_once("funciones.php");
  require_once("../clases/clase_votaciones.php");

  $voto = new Votaciones;

  $id_usuario = $_SESSION['id'];
  $id_elemento = $_GET['id'];
  $pagina = $_GET['page'];

  $voto->votar($id_usuario,$id_elemento);
  header("location:../usuarios/panel_usuario.php");

 ?>
