<?php
  session_start();
  require_once("funciones.php");
  require_once("../clases/clase_elementos.php");

  $elementos = new Elementos;


  $id_elemento = $_GET['id'];


  $elementos->eliminar_elemento($id_elemento);
    header("location:../admin/panel_administrador.php");

 ?>
