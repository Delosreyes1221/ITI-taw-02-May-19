
<?PHP
error_reporting(0);
$datosController = $_GET["id"];
error_reporting(0);
$Id_grupo = $datosController;
$respuesta = Datos::vistaMateriasModel("materias");
$respuesta2 = Datos::vistaMateriasGruposModel($datosController,"grupo_materia");
?>
<h1>MATERIAS DEL GRUPO</h1>
    <div class="row-spacing col-lg-7">
        <table class="table">
          <thead>

            <th>Nombre</th>
            <?php
          echo '</thead>';
          foreach($respuesta2 as $row => $item){
          echo'<tr>

              <td>'.$item["nombre"].'</td>
              <td align="center" ><a href="index.php?action=verMateriasGrupos&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
            </tr>';

          }
        echo '</table>';
      echo '<div>';

      $registro = new MvcController();
      $registro -> borrarMateriaGrupoController();
?>
