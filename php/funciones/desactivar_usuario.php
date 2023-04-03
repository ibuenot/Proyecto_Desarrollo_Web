<?php
  session_start();
  require_once("funciones.php");
  require_once("../clases/clase_usuarios.php");

  $usuarios = new Usuarios;

  $id_usuario = $_GET['id'];

  $usuarios->desactivar_usuario($id_usuario);
    header("location:../admin/lista_usuarios.php");

 ?>
