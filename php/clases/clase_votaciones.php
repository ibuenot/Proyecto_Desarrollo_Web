<?php

class Votaciones{
  private $conexion;
  private $id_usuario;
  private $id_elemento;

  public function tres_series_mas_votadas(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='series' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay series para mostrar";
     }
  }

  public function tres_peliculas_mas_votadas(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='peliculas' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay películas para mostrar";
     }
  }

  public function tres_videojuegos_mas_votados(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='videojuegos' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay videojuegos para mostrar";
     }
  }

  public function tres_libros_mas_votados(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='libros' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay videojuegos para mostrar";
     }
  }

  public function tres_comics_mas_votados(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='comics' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay videojuegos para mostrar";
     }
  }




//=====================================================================================================================
//=====================================================================================================================
//=====================================================================================================================
//=====================================================================================================================
//=====================================================================================================================
//USUARIOS


  public function votar($id_usuario,$id_elemento){
    $conexion = ConectarBD();

    $consulta = "INSERT INTO votaciones VALUES ('$id_usuario','$id_elemento')";

    $datos = $conexion->query($consulta);

    if ($conexion->affected_rows == 1) {
      echo "Voto correcto";

    }
  }

  public function contar_votos($id_elemento){
    $conexion = ConectarBD();

    $consulta = "SELECT count(*) FROM votaciones WHERE id_elemento=$id_elemento";

    $conexion->query($consulta);

  }


public function tres_series_mas_votadas_usuarios(){
  $conexion = ConectarBD();
  $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='series' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
  $datos = $conexion->query($consulta);

  if ($datos->num_rows>0) {

    echo "<div class='container'>
            <div class='row'>";
    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
      echo "<div class='col-4'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='img_banner'><br>

                  $fila[nombre]<br>


              </div>";
    }

    echo "</div>
    </div>";

   }
  else{
    echo "No hay series para mostrar";
   }
}

public function tres_peliculas_mas_votadas_usuarios(){
  $conexion = ConectarBD();
  $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='peliculas' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
  $datos = $conexion->query($consulta);

  if ($datos->num_rows>0) {

    echo "<div class='container'>
            <div class='row'>";
    while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
      echo "<div class='col-4'>
                  <img src='../../imagenes/elementos/$fila[foto]' class='img_banner'><br>

                  $fila[nombre]<br>


              </div>";
    }

    echo "</div>
    </div>";

   }
  else{
    echo "No hay películas para mostrar";
   }
}


  public function tres_videojuegos_mas_votados_usuarios(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='videojuegos' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay videojuegos para mostrar";
     }
  }


  public function tres_libros_mas_votados_usuarios(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='libros' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay libros para mostrar";
     }
  }

  public function tres_comics_mas_votados_usuarios(){
    $conexion = ConectarBD();
    $consulta = "SELECT * FROM votaciones, elementos WHERE elementos.tipo='comics' AND votaciones.id_elemento=elementos.id GROUP BY votaciones.id_elemento ORDER BY count(*) DESC LIMIT 3";
    $datos = $conexion->query($consulta);

    if ($datos->num_rows>0) {

      echo "<div class='container'>
              <div class='row'>";
      while ($fila = $datos->fetch_array(MYSQLI_ASSOC)) {
        echo "<div class='col-4'>
                    <img src='../../imagenes/elementos/$fila[foto]' class='img_banner'><br>

                    $fila[nombre]<br>


                </div>";
      }

      echo "</div>
      </div>";

     }
    else{
      echo "No hay videojuegos para mostrar";
     }
  }

}



 ?>
