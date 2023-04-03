<?php
session_start();
?>


<?php

  require_once("funciones.php");
  require_once("../clases/clase_reportes.php");

  $reportes = new Reportes;

  $id_usuario = $_SESSION['id'];

  $id_comentario = $_GET['id'];

  $reportes->reportar_comentario($id_usuario,$id_comentario);

  echo "<br>
  <a href = '../usuarios/series.php'> Volver atrás </a>";


 ?>

</div>
</div>

</div>

<br>
<br>
<br>
<br>
<br>

<!-- <?php
footer();
?> -->
</body>
</html>
