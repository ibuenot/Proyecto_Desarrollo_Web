<?php

class Reportes{
  private $conexion;
  private $id_usuario;
  private $id_comentario;

  public function mostrar_reportes(){

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

      $consulta2 = "SELECT usuario,texto, elementos.nombre elem, tipo, comentarios.id com FROM reportes,usuarios,comentarios,elementos WHERE reportes.id_usuario=usuarios.id AND reportes.id_comentario=comentarios.id AND comentarios.id_elemento=elementos.id LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {

        echo "<table class='table'>
      <thead>
        <tr>
          <th scope='col'>Nombre de Usuario</th>
          <th scope='col'>Comentario</th>
          <th scope='col'>Elemento</th>
          <th scope='col'>categoria del elemento</th>
          <th scope='col'>Opciones</th>

        </tr>
      </thead>
      <tbody>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<tr>
                  <td>$fila[usuario]</td> <td>$fila[texto]</td> <td>$fila[elem]</td> <td>$fila[tipo]</td> <td><a href='../funciones/eliminar_comentario.php?id=$fila[com]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br></td>";
                echo "</tr>";
        }
        echo "</tbody>
        </table>";

      }


      else{
        echo "No hay comentarios reportados";
      }

  }
      //Paginación
      echo '<nav>';
      echo '<ul class="pagination">';

      if ($total_pages > 1) {
          if ($page != 1) {
              echo '<li class="page-item"><a class="page-link" href="reportes.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
          }

          for ($i=1;$i<=$total_pages;$i++) {
              if ($page == $i) {
                  echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
              } else {
                  echo '<li class="page-item"><a class="page-link" href="reportes.php?seleccion=&page='.$i.'">'.$i.'</a></li>';
              }
          }

          if ($page != $total_pages) {
              echo '<li class="page-item"><a class="page-link" href="reportes.php?seleccion=&page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
          }
      }
      echo '</ul>';
      echo '</nav>';


  }

public function eliminar_comentario_reportado($id_comentario){
  $conexion = ConectarBD();

  $consulta = "DELETE FROM comentarios WHERE id='$id_comentario'";

  $datos = $conexion->query($consulta);

  if ($conexion->affected_rows==1) {
    echo "Hecho";
  }

}


public function reportar_comentario($id_usuario,$id_comentario){
  $conexion = ConectarBD();
  $consulta = "INSERT INTO reportes VALUES ('$id_usuario','$id_comentario')";
  $datos= $conexion->query($consulta);

  if ($conexion->affected_rows==1) {
    echo "Comentario reportado correctamente";

  }

}








}
