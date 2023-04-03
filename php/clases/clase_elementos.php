<?php

class Elementos{

  private $conexion;
  private $id;
  private $foto;
  private $nombre;
  private $categoria;
  private $descripcion;
  private $fecha;
  private $plataformas;
  private $tipo;
  private $activo;

  //=============================================================================================================================================================
  //=============================================================================================================================================================
  //=============================================================================================================================================================
  //=============================================================================================================================================================
  //=============================================================================================================================================================
  //=============================================================================================================================================================
  //=============================================================================================================================================================
  //=============================================================================================================================================================


public function buscar_serie($buscar){
      $conexion = ConectarBD();

      $consulta = "SELECT * FROM elementos WHERE tipo='series' AND nombre LIKE '%$buscar%'";

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
                  <td><img src='../../imagenes/elementos/$fila[foto]' style='width:75px'></td> <td>$fila[nombre]</td> <td>$fila[plataforma]</td>";
                echo "</tr>";
        }
        echo "</tbody>
        </table>";

      }
      else{
        echo "Fallo al buscar";
      }


    }

    public function buscar_pelicula($buscar){
          $conexion = ConectarBD();

          $consulta = "SELECT * FROM elementos WHERE tipo='peliculas' AND nombre LIKE '%$buscar%'";

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
                      <td><img src='../../imagenes/elementos/$fila[foto]' style='width:75px'></td> <td>$fila[nombre]</td> <td>$fila[plataforma]</td>";
                    echo "</tr>";
            }
            echo "</tbody>
            </table>";

          }
          else{
            echo "Fallo al buscar";
          }


        }

    public function buscar_videojuego($buscar){
              $conexion = ConectarBD();

              $consulta = "SELECT * FROM elementos WHERE tipo='videojuegos' AND nombre LIKE '%$buscar%'";

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
                          <td><img src='../../imagenes/elementos/$fila[foto]' style='width:75px'></td> <td>$fila[nombre]</td> <td>$fila[plataforma]</td>";
                        echo "</tr>";
                }
                echo "</tbody>
                </table>";

              }
              else{
                echo "Fallo al buscar";
              }


            }


      public function buscar_libro($buscar){
                  $conexion = ConectarBD();

                  $consulta = "SELECT * FROM elementos WHERE tipo='libros' AND nombre LIKE '%$buscar%'";

                  $datos=$conexion->query($consulta);

                  if ($datos->num_rows>0) {

                    echo "<table class='table'>
                  <thead>
                    <tr>
                      <th scope=''col'>Foto</th>
                      <th scope='col'>Nombre</th>
                      <th scope='col'>Autor</th>

                    </tr>
                  </thead>
                  <tbody>";
                    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                      echo "<tr>
                              <td><img src='../../imagenes/elementos/$fila[foto]' style='width:75px'></td> <td>$fila[nombre]</td> <td>$fila[autor]</td>";
                            echo "</tr>";
                    }
                    echo "</tbody>
                    </table>";

                  }
                  else{
                    echo "Fallo al buscar";
                  }
                }

        public function buscar_comic($buscar){
                      $conexion = ConectarBD();

                      $consulta = "SELECT * FROM elementos WHERE tipo='comics' AND nombre LIKE '%$buscar%'";

                      $datos=$conexion->query($consulta);

                      if ($datos->num_rows>0) {

                        echo "<table class='table'>
                      <thead>
                        <tr>
                          <th scope=''col'>Foto</th>
                          <th scope='col'>Nombre</th>
                          <th scope='col'>Autor</th>

                        </tr>
                      </thead>
                      <tbody>";
                        while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
                          echo "<tr>
                                  <td><img src='../../imagenes/elementos/$fila[foto]' style='width:75px'></td> <td>$fila[nombre]</td> <td>$fila[autor]</td>";
                                echo "</tr>";
                        }
                        echo "</tbody>
                        </table>";

                      }
                      else{
                        echo "Fallo al buscar";
                      }
        }

//USUARIO NO IDENTIFICADO
//=====================================================================================================================================
//=====================================================================================================================================
//Series
  public function ver_mas($id_elemento){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM elementos WHERE elementos.id='$id_elemento'";
    $datos = $conexion->query($consulta);
    $fila = $datos->fetch_assoc();
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>

                <div class='col-md-4 offset-md-4'  style='padding-bottom:20px'>

                  <div class='row text-center'>
                    <div class='col-md-12'>
                      <h3>$fila[nombre]</h3>
                    </div>
                  </div><br>

                  <div class='row text-center'>
                    <div class='col-md-12'>
                      <img src='../../imagenes/elementos/$fila[foto]' class='w-75'>
                    </div>
                  </div>

                  <br>

                  <br>

                  <div class='row text-center'>
                    <div class='col-md-12'>
                      <p>$fila[descripcion]</p><br>
                    </div>
                  </div>
              </div>
            </div>
          </div>";
        $conexion->close();
  }

  public function lista_series_no_identificado(){
    require_once("../funciones/paginacion.php");
    $conexion = paginacion();
    $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='series' AND activo = 1";
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
            <h3>Listado de Series</h3>
        </div>
      </div>
      <br>";

    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>


                  <form  action='../funciones/buscar_serie.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>

            </div>
          </div><br>";

          echo "<hr>";

    echo "<br>";



    $seleccion="";

    if (isset($_GET['enviar'])) {

      $seleccion = $_GET['seleccion'];

          //Filtrar por orden alfabético
          if ($seleccion=='alfabetico') {
            $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
            $resultado_alfabeto = $conexion->query($consulta_alfabeto);

            if ($resultado_alfabeto->num_rows>0) {
              echo "<div class='container-fluid'>
                      <div class='row align-items-center'>";

              while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                          <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                          <span>$fila[nombre]</span><br>
                          <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                      </div>";
              }
              echo "</div>
                    </div>";

            }
          }

          //Filtrar por valoración
          elseif ($seleccion=="valoracion") {
            $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='series' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
            $resultado_valoracion = $conexion->query($consulta_valoracion);

            if ($resultado_valoracion->num_rows>0) {
              echo "<div class='container-fluid'>
                      <div class='row align-items-center'>";

              while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                          <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                          <span>$fila[nombre]</span><br>
                          <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                      </div>";
              }
              echo "</div>
                    </div>";
            }
          }

      elseif ($seleccion=='seleccionar'){
        $consulta2 = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
        $resultado_2 = $conexion->query($consulta2);

        if ($resultado_2->num_rows>0) {
          echo "<div class='container-fluid'>
                  <div class='row align-items-center'>";

          while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                      <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                      <span>$fila[nombre]</span><br>
                      <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                  </div>";
          }
          echo "</div>
                </div>";
        }
      }
    }
    elseif($seleccion==""){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";

      }

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="series.php?'.$seleccion.'page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="series.php?seleccion='.$seleccion.'&page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="series.php?seleccion='.$seleccion.'&page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
  }


//=====================================================================================================================================
//=====================================================================================================================================
//Películas

public function lista_peliculas_no_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='peliculas' AND activo = 1";
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
          <h3>Listado de Películas</h3>
      </div>
    </div>
    <br>";


    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_pelicula.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";

  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='peliculas' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }


    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="peliculas.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="peliculas.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="peliculas.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}

//=====================================================================================================================================
//=====================================================================================================================================
//Videojuegos

public function lista_videojuegos_no_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='videojuegos' AND activo = 1";
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
          <h3>Listado de Videojuegos</h3>
      </div>
    </div>
    <br>";


    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_videojuego.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";

  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='#link' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='videojuegos' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }
    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='#link' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='#link' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="videojuegos.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="videojuegos.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="videojuegos.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}


//=====================================================================================================================================
//=====================================================================================================================================
//Libros

public function lista_libros_no_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='libros' AND activo = 1";
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
          <h3>Listado de Libros</h3>
      </div>
    </div>
    <br>";


    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_libro.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";

  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='#link' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='libros' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }


    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='#link' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='#link' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="libros.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="libros.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="libros.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}

//=====================================================================================================================================
//=====================================================================================================================================
//Comics

public function lista_comics_no_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='comics' AND activo = 1";
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
          <h3>Listado de Comics</h3>
      </div>
    </div>
    <br>";


    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_comic.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";

  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='#link' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='comics' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }


    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="comics.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="comics.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="comics.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}

//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================

//USUARIO IDENTIFICADO
//=====================================================================================================================================
//=====================================================================================================================================
//Series

public function lista_series_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='series' AND activo = 1";
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
          <h3>Listado de Series</h3>
      </div>
    </div>
    <br>";

    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_serie.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='series' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }


    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                    <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                  <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                  <a href='../usuarios/ver_mas.php?id=$fila[id]&page=$page' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

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

//=====================================================================================================================================
//=====================================================================================================================================
//Peliculas

public function lista_peliculas_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='peliculas' AND activo = 1";
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
          <h3>Listado de Películas</h3>
      </div>
    </div>
    <br>";

    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_pelicula.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";

  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='peliculas' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }


    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                    <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                  <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                  <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="peliculas.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="peliculas.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="peliculas.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}

//=====================================================================================================================================
//=====================================================================================================================================
//Videojuegos
public function lista_videojuegos_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='videojuegos' AND activo = 1";
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
          <h3>Listado de Videojuegos</h3>
      </div>
    </div>
    <br>";

    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_videojuego.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";

  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='videojuegos' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }


    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                    <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                  <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                  <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="videojuegos.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="videojuegos.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="videojuegos.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}


//=====================================================================================================================================
//=====================================================================================================================================
//Libros
public function lista_libros_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='libros' AND activo = 1";
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
          <h3>Listado de Libros</h3>
      </div>
    </div>
    <br>";


    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_libro.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='libros' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }


    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                    <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                  <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                  <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="libros.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="libros.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="libros.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}

//=====================================================================================================================================
//=====================================================================================================================================
//Comics
public function lista_comics_identificado(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='comics' AND activo = 1";
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
          <h3>Listado de Comics</h3>
      </div>
    </div>
    <br>";


    echo "<div class='container-fluid'>
            <div class='row'>
              <div class='col-md-6'>
                Filtrar por
              </div>
            </div>

            <div class='row'>
              <div class='col-md-3'>
                  <form action='#' method='GET' enctype='multipart/form-data'>
                    <select name='seleccion'>
                      <option value = 'seleccionar'>Seleccionar</option>
                      <option value='alfabetico'>Orden Alfabético</option>
                      <option value='valoracion'>Mayor valoración</option>
                      </select>
                    <input type='submit' name='enviar'>
                  </form>

                  <form  action='../funciones/buscar_comic.php' method='GET'>
                      <input type='text' name='buscar' placeholder='Buscar...'>
                      <input  type='submit' name='enviar'>
                    </form>
            </div>
          </div><br>";

          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='libros' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                        <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                        <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }

    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                    <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                    <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/votar.php?id=$fila[id]&page=$page' class='btn btn-primary btn-sm' role='button'>Like</a>
                  <a href='../funciones/anadir_a_lista.php?id=$fila[id]&page=$page' class='btn btn-success btn-sm' role='button'>Añadir a mi lista</a><br>
                  <a href='../usuarios/ver_mas.php?id=$fila[id]' >Ver más...</a>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="comics.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="comics.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="comics.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}


//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//=============================================================================================================================================================
//ADMINISTRADOR

public function insertar_serie($foto,$nombre,$categoria,$descripcion,$autor,$fecha,$plataforma,$tipo,$activo){
  $conexion=ConectarBD();
  $consulta = "INSERT INTO elementos VALUES (null,'$foto','$nombre','$categoria','$descripcion','$autor','$fecha','$plataforma','$tipo',1)";
  $datos= $conexion->query($consulta);
  echo "$datos";

  if ($conexion->affected_rows==1) {
    echo "Insertado correctamente";
  }
  else {
    echo "Fallo";
  }
}

public function insertar_pelicula($foto,$nombre,$categoria,$descripcion,$autor,$fecha,$plataforma,$tipo,$activo){
  $conexion=ConectarBD();
  $consulta = "INSERT INTO elementos VALUES (null,'$foto','$nombre','$categoria','$descripcion','$autor','$fecha','$plataforma','$tipo',1)";
  $datos= $conexion->query($consulta);
  echo "$datos";

  if ($conexion->affected_rows==1) {
    echo "Insertado correctamente";
  }
  else {
    echo "Fallo";
  }
}

public function insertar_videojuego($foto,$nombre,$categoria,$descripcion,$autor,$fecha,$plataforma,$tipo,$activo){
  $conexion=ConectarBD();
  $consulta = "INSERT INTO elementos VALUES (null,'$foto','$nombre','$categoria','$descripcion','$autor','$fecha','$plataforma','$tipo',1)";
  $datos= $conexion->query($consulta);
  echo "$datos";

  if ($conexion->affected_rows==1) {
    echo "Insertado correctamente";
  }
  else {
    echo "Fallo";
  }
}

public function insertar_libro($foto,$nombre,$categoria,$descripcion,$autor,$fecha,$plataforma,$tipo,$activo){
  $conexion=ConectarBD();
  $consulta = "INSERT INTO elementos VALUES (null,'$foto','$nombre','$categoria','$descripcion','$autor','$fecha','$plataforma','$tipo',1)";
  $datos= $conexion->query($consulta);
  echo "$datos";

  if ($conexion->affected_rows==1) {
    echo "Insertado correctamente";
  }
  else {
    echo "Fallo";
  }
}

public function insertar_comic($foto,$nombre,$categoria,$descripcion,$autor,$fecha,$plataforma,$tipo,$activo){
  $conexion=ConectarBD();
  $consulta = "INSERT INTO elementos VALUES (null,'$foto','$nombre','$categoria','$descripcion','$autor','$fecha','$plataforma','$tipo',1)";
  $datos= $conexion->query($consulta);
  echo "$datos";

  if ($conexion->affected_rows==1) {
    echo "Insertado correctamente";
  }
  else {
    echo "Fallo";
  }
}

//==============================================================================================================================================
//==============================================================================================================================================
//==============================================================================================================================================
//==============================================================================================================================================

public function modificar_elemento($id_elemento,$foto,$nombre,$categoria,$descripcion,$autor,$fecha,$plataforma,$tipo,$activo){
  $conexion=ConectarBD();

  $consulta = "UPDATE elementos SET foto = '$foto', nombre = '$nombre', categoria='$categoria', descripcion='$descripcion', autor='$autor', fecha='$fecha', plataforma='$plataforma', tipo='$tipo', activo=$activo WHERE id='$id_elemento'";

  $conexion->query($consulta);

  if ($conexion->affected_rows==1) {
    echo "Elemento modificado correctamente";
  }
  else {
    echo "Fallo $conexion->error";

  }
}

public function eliminar_elemento($id_elemento){
  $conexion = ConectarBD();

  $consulta = "UPDATE elementos SET activo = 0 WHERE id='$id_elemento'";

  $datos = $conexion->query($consulta);

  if ($conexion->affected_rows==1) {
    echo "Hecho";
  }
  else{
    echo "Fallo al eliminar el elemento";
  }
}

//=====================================================================================================================================
//=====================================================================================================================================
//Series
public function lista_series_administrador(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='series' AND activo = 1";
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
          <h3>Listado de Series</h3>
      </div>
    </div>
    <br>";


  echo "<div class='container-fluid'>

          <div class='row'>
            <div class='col-md-6'>
              Filtrar por
            </div>
          </div>

          <div class='row'>
            <div class='col-md-6'>
                <form action='#' method='GET' enctype='multipart/form-data'>
                  <select name='seleccion'>
                    <option value = 'seleccionar'>Seleccionar</option>
                    <option value='alfabetico'>Orden Alfabético</option>
                    <option value='valoracion'>Mayor valoración</option>
                  </select>
                  <input type='submit' name='enviar'>
                </form>
                <form  action='../funciones/buscar_serie.php' method='GET'>
                    <input type='text' name='buscar' placeholder='Buscar...'>
                    <input  type='submit' name='enviar'>
                  </form>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
                <a href='../funciones/insertar_serie.php' class='btn btn-primary btn-sm' role='button'>Insertar nueva serie</a>
            </div>
          </div>
        </div>

          <br>";
          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='series' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }



    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                    <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='series' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                  <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }
  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="series_admin.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="series_admin.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="series_admin.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
}

}

//=====================================================================================================================================
//=====================================================================================================================================
//Peliculas

public function lista_peliculas_administrador(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='peliculas' AND activo = 1";
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
          <h3>Listado de Películas</h3>
      </div>
    </div>
    <br>";


  echo "<div class='container-fluid'>

          <div class='row'>
            <div class='col-md-6'>
              Filtrar por
            </div>
          </div>

          <div class='row'>
            <div class='col-md-6'>
                <form action='#' method='GET' enctype='multipart/form-data'>
                  <select name='seleccion'>
                    <option value = 'seleccionar'>Seleccionar</option>
                    <option value='alfabetico'>Orden Alfabético</option>
                    <option value='valoracion'>Mayor valoración</option>
                  </select>
                  <input type='submit' name='enviar'>
                </form>
                <form  action='../funciones/buscar_serie.php' method='GET'>
                    <input type='text' name='buscar' placeholder='Buscar...'>
                    <input  type='submit' name='enviar'>
                  </form>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
                <a href='../funciones/insertar_pelicula.php' class='btn btn-primary btn-sm' role='button'>Insertar nueva película</a>
            </div>
          </div>
        </div>

          <br>";
          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='peliculas' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }



    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                    <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='peliculas' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                  <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="peliculas_admin.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="peliculas_admin.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="peliculas_admin.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
  }

}


//=====================================================================================================================================
//=====================================================================================================================================
//Videojuegos
public function lista_videojuegos_administrador(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='videojuegos' AND activo = 1";
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
          <h3>Listado de Videojuegos</h3>
      </div>
    </div>
    <br>";


  echo "<div class='container-fluid'>

          <div class='row'>
            <div class='col-md-6'>
              Filtrar por
            </div>
          </div>

          <div class='row'>
            <div class='col-md-6'>
                <form action='#' method='GET' enctype='multipart/form-data'>
                  <select name='seleccion'>
                    <option value = 'seleccionar'>Seleccionar</option>
                    <option value='alfabetico'>Orden Alfabético</option>
                    <option value='valoracion'>Mayor valoración</option>
                  </select>
                  <input type='submit' name='enviar'>
                </form>
                <form  action='../funciones/buscar_videojuego.php' method='GET'>
                    <input type='text' name='buscar' placeholder='Buscar...'>
                    <input  type='submit' name='enviar'>
                  </form>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
                <a href='../funciones/insertar_videojuego.php' class='btn btn-primary btn-sm' role='button'>Insertar nuevo videojuego</a>
            </div>
          </div>
        </div>

          <br>";

          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='videojuegos' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }



    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                    <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='videojuegos' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                  <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="videojuegos_admin.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="videojuegos_admin.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="videojuegos_admin.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
  }

}


//=====================================================================================================================================
//=====================================================================================================================================
//Libros
public function lista_libros_administrador(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='libros' AND activo = 1";
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
          <h3>Listado de Libros</h3>
      </div>
    </div>
    <br>";


  echo "<div class='container-fluid'>

          <div class='row'>
            <div class='col-md-6'>
              Filtrar por
            </div>
          </div>

          <div class='row'>
            <div class='col-md-6'>
                <form action='#' method='GET' enctype='multipart/form-data'>
                  <select name='seleccion'>
                    <option value = 'seleccionar'>Seleccionar</option>
                    <option value='alfabetico'>Orden Alfabético</option>
                    <option value='valoracion'>Mayor valoración</option>
                  </select>
                  <input type='submit' name='enviar'>
                </form>
                <form  action='../funciones/buscar_libro.php' method='GET'>
                    <input type='text' name='buscar' placeholder='Buscar...'>
                    <input  type='submit' name='enviar'>
                  </form>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
                <a href='../funciones/insertar_libro.php' class='btn btn-primary btn-sm' role='button'>Insertar nuevo Libro</a>
            </div>
          </div>
        </div>

          <br>";

          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='libros' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }



    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                    <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='libros' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                  <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="libros_admin.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="libros_admin.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="libros_admin.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
  }

}

//=====================================================================================================================================
//=====================================================================================================================================
//Comics
public function lista_comics_administrador(){

  require_once("../funciones/paginacion.php");
  $conexion = paginacion();
  $consulta = "SELECT COUNT(*) as total_elementos FROM elementos WHERE tipo='series' AND activo = 1";
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
          <h3>Listado de Comics</h3>
      </div>
    </div>
    <br>";


  echo "<div class='container-fluid'>

          <div class='row'>
            <div class='col-md-6'>
              Filtrar por
            </div>
          </div>

          <div class='row'>
            <div class='col-md-6'>
                <form action='#' method='GET' enctype='multipart/form-data'>
                  <select name='seleccion'>
                    <option value = 'seleccionar'>Seleccionar</option>
                    <option value='alfabetico'>Orden Alfabético</option>
                    <option value='valoracion'>Mayor valoración</option>
                  </select>
                  <input type='submit' name='enviar'>
                </form>
                <form  action='../funciones/buscar_comic.php' method='GET'>
                    <input type='text' name='buscar' placeholder='Buscar...'>
                    <input  type='submit' name='enviar'>
                  </form>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-6'>
                <a href='../funciones/insertar_comic.php' class='btn btn-primary btn-sm' role='button'>Insertar nuevo Comic</a>
            </div>
          </div>
        </div>

          <br>";

          echo "<hr>";

  echo "<br>";



  if (isset($_GET['enviar'])) {

    $seleccion = $_GET['seleccion'];

        //Filtrar por orden alfabético
        if ($seleccion=='alfabetico') {
          $consulta_alfabeto = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 ORDER BY nombre ASC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_alfabeto = $conexion->query($consulta_alfabeto);

          if ($resultado_alfabeto->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_alfabeto->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";

          }
        }

        //Filtrar por valoración
        elseif ($seleccion=="valoracion") {
          $consulta_valoracion = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='comics' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
          $resultado_valoracion = $conexion->query($consulta_valoracion);

          if ($resultado_valoracion->num_rows>0) {
            echo "<div class='container-fluid'>
                    <div class='row align-items-center'>";

            while ($fila = $resultado_valoracion->fetch_array(MYSQLI_ASSOC)) {
              echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                        <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                        <span>$fila[nombre]</span><br>
                        <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                        <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                    </div>";
            }
            echo "</div>
                  </div>";
          }
        }



    elseif ($seleccion=='seleccionar'){
      $consulta2 = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
      $resultado_2 = $conexion->query($consulta2);

      if ($resultado_2->num_rows>0) {
        echo "<div class='container-fluid'>
                <div class='row align-items-center'>";

        while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
          echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                    <span>$fila[nombre]</span><br>
                    <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                    <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
                </div>";
        }
        echo "</div>
              </div>";
      }
    }

  }
  else{
    $consulta2 = "SELECT * FROM elementos WHERE tipo='comics' AND activo = 1 LIMIT ".$start.", ".NUM_ITEMS_BY_PAGE;
    $resultado_2 = $conexion->query($consulta2);

    if ($resultado_2->num_rows>0) {
      echo "<div class='container-fluid'>
              <div class='row align-items-center'>";

      while ($fila = $resultado_2->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-md-3 offset-md-1'  style='padding-bottom:20px'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='w-50'><br>
                  <span>$fila[nombre]</span><br>
                  <a href='../funciones/modificar_elemento.php?id=$fila[id]' class='btn btn-primary btn-sm' role='button'>Modificar</a>
                  <a href='../funciones/eliminar_elemento.php?id=$fila[id]' class='btn btn-danger btn-sm' role='button'>Eliminar</a><br>
              </div>";
      }
      echo "</div>
            </div>";

    }
  }

  echo "<hr>";

  //Paginación
  echo '<nav>';
  echo '<ul class="pagination">';

  if ($total_pages > 1) {
      if ($page != 1) {
          echo '<li class="page-item"><a class="page-link" href="comics_admin.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
      }

      for ($i=1;$i<=$total_pages;$i++) {
          if ($page == $i) {
              echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
          } else {
              echo '<li class="page-item"><a class="page-link" href="comics_admin.php?page='.$i.'">'.$i.'</a></li>';
          }
      }

      if ($page != $total_pages) {
          echo '<li class="page-item"><a class="page-link" href="comics_admin.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
      }
  }
  echo '</ul>';
  echo '</nav>';
  }








}
}

 ?>
