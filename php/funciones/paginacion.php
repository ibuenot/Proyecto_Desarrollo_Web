<?php

function paginacion(){
  define('DB_SERVER', 'localhost');
  define('DB_SERVER_USERNAME', 'root');
  define('DB_SERVER_PASSWORD', '');
  define('DB_DATABASE', 'proyecto_web');
  define('NUM_ITEMS_BY_PAGE', 9);

  $conexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);

  return $conexion;
}

?>
