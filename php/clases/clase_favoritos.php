<?php

class Favoritos{
  private $conexion;
  private $id_usuario;
  private $id_elemento;
  private $visto;


//Al añadir a la lista se establece el "no visto" por defecto
  public function anadir_a_lista($id_usuario,$id_elemento){
    $conexion = ConectarBD();

    $consulta = "INSERT INTO favoritos VALUES ('$id_usuario','$id_elemento','n')";

    $datos = $conexion->query($consulta);

    if ($conexion->affected_rows == 1) {
    }
  }

  public function mostrar_favoritos($id_usuario){

    require_once("../funciones/paginacion.php");
    $conexion = paginacion();
    $consulta = "SELECT COUNT(*) as total_elementos FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id";
    $resultado = $conexion->query($consulta);
    $row = $resultado->fetch_assoc();
    $num_total_rows = $row['total_elementos'];

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
            <h3>Lista de Favoritos</h3>
        </div>
      </div>
      <br>";


      echo "<div class='container-fluid'>

              <div class='row'>
                <div class='col-md-6'>
                  Mostrar
                </div>
              </div>

              <div class='row'>
                  <div class='col-md-2'>
                      <form action='#' method='GET' enctype='multipart/form-data'>
                        <select name='seleccion'>
                          <option value = 'todo'>Todo</option>
                          <option value='series'>Series</option>
                          <option value='peliculas'>Películas</option>
                          <option value='videojuegos'>Videojuegos</option>
                          <option value='libros'>Libros</option>
                          <option value='comics'>Comics</option>
                        </select>
                        <input type='submit' name='enviar'>
                      </form>
                    </div>

                    <div class='col-md-2  offset-md-8'>
                        <nav class='navbar navbar-light bg-light'>
                          <form class='form-inline' action='../funciones/buscar_favorito.php' method='GET'>
                              <input type='hidden' name='id' value='$id_usuario'>
                              <input type='text' name='buscar' placeholder='Buscar...' aria-label='buscar'>
                              <button class='btn btn-outline-success btn-sm my-2 my-sm-0' type='submit'>Buscar</button>
                            </form>
                        </nav>
                        </div>

              </div>
            </div>";

    echo "<br>";

    if (isset($_GET['enviar'])) {

      $seleccion = $_GET['seleccion'];

          //Filtrar por series
          if ($seleccion=='series') {
            $consulta_series = "SELECT * FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id AND elementos.tipo='series' ORDER BY favoritos.id_elemento ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
            $resultado_series = $conexion->query($consulta_series);

            if ($resultado_series->num_rows>0) {

              echo "<table class='table'>
            <thead>
              <tr>
                <th scope=''col'>Foto</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Visto</th>
                <th scope='col'>Opciones</th>
              </tr>
            </thead>
            <tbody>";

              while ($fila = $resultado_series->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>
                        <td><img src='../../imagenes/elementos/$fila[foto]' style='width:150px'></td> <td>$fila[nombre]</td> <td>$fila[tipo]</td>";

                        if ($fila['visto']=='s') {
                          echo "<td><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                        <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                      </svg></td> <td><a href='../funciones/marcar_elemento_no_visto.php?id=$fila[id]&seleccion=series&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como no visto</a></td>";
                        }
                        else{
                          echo "<td></td> <td><a href='../funciones/marcar_elemento_visto.php?id=$fila[id]' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }

                        echo "<td><a href='../funciones/eliminar_de_lista.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button' aria-disabled='true'>Eliminar</a></td>";
                        echo "</tr>";
              }
              echo "
              </tbody>
              </table>";

            }
          }

          //Filtrar por peliculas
          elseif ($seleccion=='peliculas') {
            $consulta_peliculas = "SELECT * FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id AND elementos.tipo='peliculas' ORDER BY favoritos.id_elemento ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
            $resultado_peliculas = $conexion->query($consulta_peliculas);


            if ($resultado_peliculas->num_rows>0) {

              echo "<table class='table'>
            <thead>
              <tr>
                <th scope=''col'>Foto</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Visto</th>
                <th scope='col'>Opciones</th>
              </tr>
            </thead>
            <tbody>";

              while ($fila = $resultado_peliculas->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>
                        <td><img src='../../imagenes/elementos/$fila[foto]' style='width:150px'></td> <td>$fila[nombre]</td> <td>$fila[tipo]</td>";

                        if ($fila['visto']=='s') {
                          echo "<td><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                        <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                      </svg></td>
                      <td><a href='#' class='btn btn-secondary btn-sm disabled' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        else{
                          echo "<td></td> <td><a href='../funciones/marcar_elemento_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        echo "<td><a href='../funciones/eliminar_de_lista.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button' aria-disabled='true'>Eliminar</a></td>";
                        echo "</tr>";
              }
              echo "
              </tbody>
              </table>";

            }
          }

          //Filtrar por videojuegos
          elseif ($seleccion=='videojuegos') {
            $consulta_videojuegos = "SELECT * FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id AND elementos.tipo='videojuegos' ORDER BY favoritos.id_elemento ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
            $resultado_videojuegos = $conexion->query($consulta_videojuegos);


            if ($resultado_videojuegos->num_rows>0) {

              echo "<table class='table'>
            <thead>
              <tr>
                <th scope=''col'>Foto</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Visto</th>
                <th scope='col'>Opciones</th>
              </tr>
            </thead>
            <tbody>";

              while ($fila = $resultado_videojuegos->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>
                        <td><img src='../../imagenes/elementos/$fila[foto]' style='width:150px'></td> <td>$fila[nombre]</td> <td>$fila[tipo]</td>";

                        if ($fila['visto']=='s') {
                          echo "<td><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                        <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                      </svg></td>
                      <td><a href='#' class='btn btn-secondary btn-sm disabled' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        else{
                          echo "<td></td> <td><a href='../funciones/marcar_elemento_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        echo "<td><a href='../funciones/eliminar_de_lista.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button' aria-disabled='true'>Eliminar</a></td>";
                        echo "</tr>";
              }
              echo "
              </tbody>
              </table>";

            }
          }

          //Filtrar por libros
          elseif ($seleccion=='libros') {
            $consulta_libros = "SELECT * FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id AND elementos.tipo='libros' ORDER BY favoritos.id_elemento ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
            $resultado_libros = $conexion->query($consulta_libros);


            if ($resultado_libros->num_rows>0) {

              echo "<table class='table'>
            <thead>
              <tr>
                <th scope=''col'>Foto</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Visto</th>
                <th scope='col'>Opciones</th>
              </tr>
            </thead>
            <tbody>";

              while ($fila = $resultado_libros->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>
                        <td><img src='../../imagenes/elementos/$fila[foto]' style='width:150px'></td> <td>$fila[nombre]</td> <td>$fila[tipo]</td>";

                        if ($fila['visto']=='s') {
                          echo "<td><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                        <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                      </svg></td>
                      <td><a href='#' class='btn btn-secondary btn-sm disabled' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        else{
                          echo "<td></td> <td><a href='../funciones/marcar_elemento_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        echo "<td><a href='../funciones/eliminar_de_lista.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button' aria-disabled='true'>Eliminar</a></td>";
                        echo "</tr>";
              }
              echo "
              </tbody>
              </table>";

            }
          }

          //Filtrar por comics
          elseif ($seleccion=='comics') {
            $consulta_comics = "SELECT * FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id AND elementos.tipo='comics' ORDER BY favoritos.id_elemento ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
            $resultado_comics = $conexion->query($consulta_comics);


            if ($resultado_comics->num_rows>0) {

              echo "<table class='table'>
            <thead>
              <tr>
                <th scope=''col'>Foto</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Visto</th>
                <th scope='col'>Opciones</th>
              </tr>
            </thead>
            <tbody>";

              while ($fila = $resultado_comics->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>
                        <td><img src='../../imagenes/elementos/$fila[foto]' style='width:150px'></td> <td>$fila[nombre]</td> <td>$fila[tipo]</td>";

                        if ($fila['visto']=='s') {
                          echo "<td><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                        <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                      </svg></td>
                      <td><a href='#' class='btn btn-secondary btn-sm disabled' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        else{
                          echo "<td></td> <td><a href='../funciones/marcar_elemento_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como visto</a></td>";
                        }
                        echo "<td><a href='../funciones/eliminar_de_lista.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button' aria-disabled='true'>Eliminar</a></td>";
                        echo "</tr>";
              }
              echo "
              </tbody>
              </table>";

            }
          }

      //Sin filtros
      elseif ($seleccion=='todo'){
        $consulta2 = "SELECT * FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id ORDER BY favoritos.id_elemento ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
        $resultado_2 = $conexion->query($consulta2);

        if ($resultado_2->num_rows>0) {

          echo "<table class='table'>
        <thead>
          <tr>
            <th scope=''col'>Foto</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Tipo</th>
            <th scope='col'>Visto</th>
            <th scope='col'>Opciones</th>
          </tr>
        </thead>
        <tbody>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<tr>
                  <td><img src='../../imagenes/elementos/$fila[foto]' style='width:150px'></td> <td>$fila[nombre]</td> <td>$fila[tipo]</td>";

                  if ($fila['visto']=='s') {
                    echo "<td><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                  <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                </svg></td>

                <td><a href='../funciones/marcar_elemento_no_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como no visto</a></td>";

                  }
                  else{
                    echo "<td></td> <td><a href='../funciones/marcar_elemento_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como visto</a></td>";

                  }
                  echo "<td><a href='../funciones/eliminar_de_lista.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button' aria-disabled='true'>Eliminar</a></td>";
                  echo "</tr>";
        }
        echo "</tbody>
        </table>";

        }
      }

    }
    else{
      $consulta2 = "SELECT * FROM elementos, favoritos WHERE favoritos.id_usuario='$id_usuario' AND favoritos.id_elemento=elementos.id ORDER BY favoritos.id_elemento ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {

        echo "<table class='table'>
      <thead>
        <tr>
          <th scope=''col'>Foto</th>
          <th scope='col'>Nombre</th>
          <th scope='col'>Tipo</th>
          <th scope='col'>Visto</th>
          <th scope='col'>Opciones</th>
        </tr>
      </thead>
      <tbody>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<tr>
                  <td><img src='../../imagenes/elementos/$fila[foto]' style='width:150px'></td> <td>$fila[nombre]</td> <td>$fila[tipo]</td>";

                  if ($fila['visto']=='s') {
                    echo "<td><svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-check2' viewBox='0 0 16 16'>
                  <path d='M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z'/>
                </svg></td>
                <td><a href='../funciones/marcar_elemento_no_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como no visto</a></td>";

                  }
                  else{
                    echo "<td></td><td><a href='../funciones/marcar_elemento_visto.php?id=$fila[id]&page=$page' class='btn btn-info btn-sm' role='button' aria-disabled='true'>Marcar como visto</a></td>";

                  }

                echo "<td><a href='../funciones/eliminar_de_lista.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button' aria-disabled='true'>Eliminar</a></td>";
                echo "</tr>";
        }
        echo "</tbody>
        </table>";

      }
    }

    //Paginación
    if ($total_pages > 1) {
        if ($page != 1) {
            echo '<li class="page-item"><a class="page-link" href="series.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="series.php?page='.$i.'">'.$i.'</a></li>';
            }
        }

        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="series.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
    echo '</nav>';
  }

  }


//=================================================================================================================================================================
//=================================================================================================================================================================
//=================================================================================================================================================================
//=================================================================================================================================================================

  public function marcar_visto($id_usuario,$id_elemento){
      $conexion = ConectarBD();

      $consulta = "UPDATE favoritos set visto = 's' WHERE id_usuario='$id_usuario' AND id_elemento='$id_elemento'";

      $datos = $conexion->query($consulta);

      if ($conexion->affected_rows==1) {
        echo "Hecho";
      }
  }

  public function marcar_no_visto($id_usuario,$id_elemento){
      $conexion = ConectarBD();

      $consulta = "UPDATE favoritos set visto = 'n' WHERE id_usuario='$id_usuario' AND id_elemento='$id_elemento'";

      $datos = $conexion->query($consulta);

      if ($conexion->affected_rows==1) {
        echo "Hecho";
      }
  }

  public function eliminar_de_lista($id_usuario,$id_elemento){
      $conexion = ConectarBD();

      $consulta = "DELETE FROM favoritos WHERE id_usuario='$id_usuario' AND id_elemento='$id_elemento'";

      $datos = $conexion->query($consulta);

      if ($conexion->affected_rows==1) {
        echo "Hecho";
      }

  }


public function buscar_favorito($id_usuario,$buscar){
  $conexion = ConectarBD();

  $consulta = "SELECT * FROM elementos, favoritos WHERE favoritos.id_elemento=elementos.id AND favoritos.id_usuario='$id_usuario' AND elementos.nombre LIKE '%$buscar%'";

  $datos=$conexion->query($consulta);

  if ($datos->num_rows>0) {
    echo "<table class='table'>
  <thead>
    <tr>
      <th scope=''col'>Foto</th>
      <th scope='col'>Nombre</th>
      <th scope='col'>Plataforma</th>
    </tr>
  </thead>
  <tbody>";
    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
      echo "<tr>
                <td><img src='../../imagenes/elementos/$fila[foto]' style='width:50px'></td> <td>$fila[nombre]</td> <td>$fila[plataforma]</td>
            </tr>";
    }

    echo "</tbody>
    </table>";

  }
  else{
    echo "Fallo al buscar";
  }
}





//=================================================================================================================================================================
//=================================================================================================================================================================
//=================================================================================================================================================================
//=================================================================================================================================================================



}








 ?>
