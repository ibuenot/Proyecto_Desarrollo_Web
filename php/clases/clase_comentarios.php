<?php

class Comentarios{
  private $conexion;
  private $id;
  private $texto;
  private $fecha;
  private $id_usuario;
  private $id_elemento;


    public function ver_comentarios_no_identificado($id_elemento){
      $conexion = ConectarBD();
      $consulta = "SELECT * FROM elementos,comentarios,usuarios WHERE usuarios.id=comentarios.id_usuario AND elementos.id=comentarios.id_elemento AND elementos.id='$id_elemento' LIMIT 10";
      $datos = $conexion->query($consulta);

      if ($datos->num_rows>0) {

        echo "<div class='container'>
                    <div class='row text-center' style='background-color:lightblue'>
                      <div class='col-md-12'>
                        <h5>Comentarios</h5>
                      </div>
                    </div>
                    <br>";
        echo "<div class='row text-center'>
                <div class='col-md-12'>
                  <span style='font-weight:bold'>Debes estar registrado para escribir comentarios</span>
                </div>
              </div>
              <br>
              <hr>";
        while ($fila=$datos->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class='row '>
                          <div class='col-md-12'>
                            $fila[usuario]
                          </div>
                  </div>

                  <div class='row text-center'>
                          <div class='col-md-12'>
                            $fila[texto]
                            <hr>
                          </div>
                    </div>";
        }

      }
      else{
        echo "<div class='container'>
                    <div class='row text-center' style='background-color:lightblue'>
                      <div class='col-md-12'>
                        <h5>Comentarios</h5>
                      </div>
                    </div>
                    <br>";
        echo "<div class='row text-center'>
                <div class='col-md-12'>
                  <pan style='font-weight:bold'>Debes estar registrado para escribir comentarios</span>
                </div>
              </div>
              <br>
              <hr>
              <div class='row text-center'>
                      <div class='col-md-12'>
                        <span>No hay comentarios para mostrar</span>
                      </div>
              </div>
              <br>
              <hr>";
      }

    echo "</div>";
}


    public function ver_comentarios_identificado($id_elemento){
      $conexion = ConectarBD();
      $consulta = "SELECT *, elementos.id elem, comentarios.id com FROM elementos,comentarios,usuarios WHERE usuarios.id=comentarios.id_usuario AND elementos.id=comentarios.id_elemento AND elementos.id='$id_elemento' LIMIT 10";
      $datos = $conexion->query($consulta);

      echo "<div class='container'>
                  <div class='row text-center' style='background-color:lightblue'>
                    <div class='col-md-12'>
                      <h5>Comentarios</h5>
                    </div>
                  </div>
                  <br>";

      echo "<form method='GET' action='../funciones/insertar_comentario.php'>
                <input type='hidden' name='id' value=$id_elemento>
                <label for='texto'>Comentar</label>
                <textarea class='form-control z-depth-1' id='texto' name ='texto' rows='3' placeholder='Escribe un comentario...'></textarea>
                <input type='submit' name='enviar'>
                </form>
             <br>
            <hr>";


      if ($datos->num_rows>0) {


        while ($fila=$datos->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class='row '>
                          <div class='col-md-12'>
                            $fila[usuario]
                          </div>
                  </div>

                  <div class='row text-center'>
                          <div class='col-md-12'>
                            $fila[texto]<br><br>
                            <a href='../funciones/reportar_comentario.php?id=$fila[com]' class='btn btn-warning btn-sm' role='button'>Reportar</a><br>
                            <hr>
                          </div>
                    </div>";
        }

      }
      else{
        echo "<div class='row text-center'>
                <div class='col-md-12'>
                  <span >No hay comentarios para mostrar</span>
                </div>
        </div>
        <br>
        <hr>";
      }

    echo "</div>";
    }

    public function ver_comentarios_administrador($id_elemento){
      $conexion = ConectarBD();

      $consulta = "SELECT * FROM elementos,comentarios,usuarios WHERE usuarios.id=comentarios.id_usuario AND elementos.id=comentarios.id_elemento AND elementos.id='$id_elemento' LIMIT 10";

      $datos = $conexion->query($consulta);


      $fila = $datos->fetch_assoc();

    echo "<div class='container'>
                <div class='row text-center' style='background-color:lightblue'>
                  <div class='col-md-12'>
                    <h5>Comentarios</h5>
                  </div>
                </div>
                <br>

                <div class='row '>
                  <div class='col-md-12'>
                    <p><span>$fila[usuario]</span>

                  </div>
                </div>

                <div class='row text-center'>
                  <div class='col-md-12'>
                    $fila[texto]
                    <hr>
                  </div>
                </div>

            </div>";

    }


public function insertar_comentario($id_usuario,$texto,$fecha,$id_elemento){
  $conexion = ConectarBD();
  $consulta = "INSERT INTO comentarios VALUES (null,'$texto','$fecha','$id_usuario','$id_elemento')";
  $datos= $conexion->query($consulta);

  if ($conexion->affected_rows==1) {
    echo "Comentario Insertado correctamente";

  }

}










}



 ?>
