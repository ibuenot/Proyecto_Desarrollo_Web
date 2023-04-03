<?php
session_start();
require_once("funciones.php");
require_once("../clases/clase_usuarios.php");

$usuarios = new Usuarios;

if (isset($_POST['enviar'])) {
  $nombre = $_POST['nombre'];
  $usuario = $_POST['usuario'];

  //La contraseña se encripta por seguridad
  $contrasena = $_POST['contrasena'];
  $contrasena_encriptada = md5(md5($contrasena));

  //Al usuario se le pone una foto por defecto
  $foto = "por_defecto.png";

  $fecha_nacimiento=$_POST['fecha_nacimiento'];

  $usuarios->registrar_nuevo_usuario($nombre,$usuario,$contrasena_encriptada,$foto,$fecha_nacimiento);


}





 ?>
