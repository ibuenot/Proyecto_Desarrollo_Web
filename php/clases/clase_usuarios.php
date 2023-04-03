<?php

class Usuarios{
  private $conexion;
  private $id;
  private $nombre;
  private $usuario;
  private $contrasena;
  private $foto;
  private $fecha_nacimiento;
  private $activo;

  public function mostrar_datos($id_usuario){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM usuarios WHERE id='$id_usuario'";

    $datos=$conexion->query($consulta);

    echo "<div class='container'>";
    if ($datos->num_rows>0) {
      while ($fila=$datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='row text-center'>

                <div class='row'>
                  <div class='col-md-12 text-center'>
                      <span>$fila[usuario]</span>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-md-12'>
                      <p> </p>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-md-12'>
                        <img src=../../imagenes/usuarios/$fila[foto] style='width:300px'>
                  </div>
              </div>
              <div class='row'>
                <div class='col-md-12 text-center'>
                    <a href='../funciones/modificar_foto_perfil.php?id=$id_usuario'>Modificar Foto de Perfil</a>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-12'>
                    <p> </p>
                </div>
              </div>
              <div class='row'>
                <div class='col-md-12 text-center'>
                    <a href='../funciones/modificar_contrasena.php?id=$id_usuario'>Modificar Contraseña</a>
                </div>
              </div>

              ";
      }
    }

    echo "
    </div>";
  }


  public function modificar_contrasena($id_usuario, $contrasena){
    $conexion=ConectarBD();

    $consulta = "UPDATE usuarios SET contrasena = '$contrasena' WHERE id='$id_usuario'";

    $conexion->query($consulta);

    if ($conexion->affected_rows==1) {
      echo "Contraseña modificada correctamente";
      header('refresh:2;url=../usuarios/mis_datos.php');
    }

  }

  public function modificar_foto_de_perfil($id_usuario, $foto){
    $conexion=ConectarBD();

    $consulta = "UPDATE usuarios SET foto = '$foto' WHERE id='$id_usuario'";

    $conexion->query($consulta);

    if ($conexion->affected_rows==1) {
      echo "Foto de perfil modificada correctamente";
      header('refresh:2;url=../usuarios/mis_datos.php');
    }

  }




//==============================================================================================================================================
//==============================================================================================================================================
//==============================================================================================================================================
//==============================================================================================================================================
//==============================================================================================================================================
//==============================================================================================================================================
//ADMINSITRADOR
  public function lista_usuarios(){

    require_once("../funciones/paginacion.php");
    $conexion = paginacion();
    $consulta = "SELECT COUNT(*) as total_usuarios FROM usuarios";
    $resultado = $conexion->query($consulta);
    $row = $resultado->fetch_assoc();
    $num_total_rows = $row['total_usuarios'];

    if ($num_total_rows > 0) {
    $page = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    if (!$page) {
        $start = 0;
        $page = 1;
    } else
    {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    }
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

    echo "<div class='container-fluid'>
            <div class='row' style='background-color:lightblue'>
              <div class='col-12'>
                <h3>Lista de Usuarios</h3>
              </div>
            </div>
          </div>
      <br>";

      $consulta2 = "SELECT * FROM usuarios WHERE id > 0 ORDER BY id ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {

        echo "<table class='table'>
      <thead>
        <tr>
          <th scope=''col'>Foto</th>
          <th scope='col'>Nombre</th>
          <th scope='col'>Nombre de Usuario</th>
          <th scope='col'>Fecha de Nacimiento</th>
          <th scope='col'>Opciones</th>

        </tr>
      </thead>
      <tbody>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<tr>
                  <td><img src='../../imagenes/usuarios/$fila[foto]' style='width:50px'></td> <td>$fila[nombre]</td> <td>$fila[usuario]</td> <td>$fila[fecha_nacimiento]</td>";

                  if ($fila['activo']=='1') {
                    echo "<td><a href='../funciones/desactivar_usuario.php?id=$fila[id]' class='btn btn-secondary btn-sm' role='button' aria-disabled='true'>Desactivar</a></td>";

                  }
                  else{
                    echo "<td><a href='../funciones/activar_usuario.php?id=$fila[id]' class='btn btn-success btn-sm' role='button' aria-disabled='true'>Activar</a></td>";

                  }


                echo "</tr>";
        }
        echo "</tbody>
        </table>";

      }

}
      //Paginación
      echo '<nav>';
      echo '<ul class="pagination">';

      if ($total_pages > 1) {
          if ($page != 1) {
              echo '<li class="page-item"><a class="page-link" href="lista_usuarios.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
          }

          for ($i=1;$i<=$total_pages;$i++) {
              if ($page == $i) {
                  echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
              } else {
                  echo '<li class="page-item"><a class="page-link" href="lista_usuarios.php?seleccion=&page='.$i.'">'.$i.'</a></li>';
              }
          }

          if ($page != $total_pages) {
              echo '<li class="page-item"><a class="page-link" href="lista_usuarios.php?seleccion=&page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
          }
      }
      echo '</ul>';
      echo '</nav>';
}





//Función para regsitrar un nuevo usuario. Por defecto estará activado en la base de datos y tendrá una foto de perfil prederteminada
public function registrar_nuevo_usuario($nombre,$usuario,$contrasena_encriptada,$foto,$fecha_nacimiento){
  $conexion = ConectarBD();

  $consulta = "INSERT INTO usuarios VALUES (null,'$nombre','$usuario','$contrasena_encriptada','$foto','$fecha_nacimiento',1)";

  $conexion->query($consulta);

  if ($conexion->affected_rows==1) {
    echo "Usuario registrado correctamente";
    header("refresh:2;url=../funciones/iniciar_sesion.php");
  }

}

public function activar_usuario($id_usuario){
  $conexion = ConectarBD();
  $consulta = "UPDATE usuarios SET activo = 1 WHERE id='$id_usuario'";

  $conexion->query($consulta);

  if ($conexion->affected_rows>0) {
    echo "Hecho";
  }
  else{
    echo "Fallo";
  }
}

public function desactivar_usuario($id_usuario){
  $conexion = ConectarBD();
  $consulta = "UPDATE usuarios SET activo = 0 WHERE id='$id_usuario'";

  $conexion->query($consulta);

  if ($conexion->affected_rows>0) {
    echo "Hecho";
  }
  else{
    echo "Fallo";
  }
}












}






?>
