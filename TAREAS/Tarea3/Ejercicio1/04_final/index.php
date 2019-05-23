<?php
include_once('utilities.php');
//$user_access = [];
$total_users = count($user_access);

  //Incluimos el archvio database
  include ('database.php');
  //Creamos un objeto de la clase DataBase
  $usuario = new Database();
 

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>

    <div class="row">
      <div class="large-9 columns">
      <div align="center">
        <h3>Concentrado de tablas</h3>
      </div>
  <br><br><br>
        <!-- AQUI SE MUESTRA LA CUARTA TABLA (USER_TYPE) -->
        <h3 align="center">Indicadores</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Usuarios</th>
                    <th width="250">Status</th>
                    <th width="250">Accesos</th>
                    <th width="250">Usarios Activos</th>
                    <th width="250">Usuarios inactivos</th>                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //Asignamos a la vaariable listado el valor de la funcion read
                   $listado_usuario=$usuario->cont_Usuario();     
                   $listado_status=$usuario->cont_Status();     
                   $listado_log=$usuario->cont_Log();
                   $listado_activo=$usuario->activos();
                   $listado_inactivo=$usuario->inactivos();

                     //$listado_type=$usuario->cont_Type();
                                          
                    ?>
                    <td><?php echo $listado_usuario ?></td>
                    <td><?php echo $listado_status ?></td>
                    <td><?php echo $listado_log ?></td>
                    <td><?php echo $listado_activo ?></td>
                    <td><?php echo $listado_inactivo ?></td>

                    <!-- Imprimimos los valores de las variables dentro de la tabla                    -->
                    <tr>
                
                  </tr>                 
                  
                </tbody>
              </table>
              <?php } ?>
            </div>
          </section>
        </div> 

                           <!-- AQUI SE MUESTRA LA PRIMERA TABLA -->
          <h3 align="center">User</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">id</th>
                    <th width="250">Email</th>
                    <th width="250">Pssw</th>
                    <th width="250">Status_id</th>
                    <th width="250">User_type_id</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                 //Asignamos a la vaariable listado el valor de la funcion read
                 $listado=$usuario->leerUsuario();
                 //Recorremos mediante el whie la cantidad de columnas de la tabla
                  while($row=mysqli_fetch_object($listado)){
                    //Creamos las variables y les asignamos el valor de la columna

                    $id=$row->id;
                    $Email=$row->Email;
                    $Pssw=$row->Pssw;
                    $Status_id=$row->Satus_id;
                    $User_type_id = $row->User_type_id;
                    ?>
                    
                    <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $Email?></td>
                    <td><?php echo $Pssw?></td>
                    <td><?php echo $Status_id?></td>
                    <td><?php echo $User_type_id?></td>
                    

                    <!-- <td><a href="./key.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td> -->
                  </tr>
  
                  <?php
                 }
                 ?>
                  <!-- <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr> -->
                </tbody>
              </table>
              <?php } ?>
             
            </div>
          </section>
        </div>
        
        <!-- AQUI SE MUESTRA LA SEGUNDA TABLA (USER_LOG) -->
        <h3 align="center">User_log</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Date_logged</th>
                    <th width="250">User_id</th>     
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //Asignamos a la vaariable listado el valor de la funcion read
                   $listado2=$usuario->leerUser_log();
                  while($row=mysqli_fetch_object($listado2)){
                    //Creamos las variables y les asignamos el valor de la columna
                    $id=$row->id;
                    $Date_logged=$row->Date_logged;
                    $User_id=$row->User_id;                
                    ?>
                    <!-- Imprimimos los valores de las variables dentro de la tabla                    -->
                    <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $Date_logged?></td>
                    <td><?php echo $User_id?></td>
                    <!-- <td><a href="./key.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td> -->
                  </tr>
                  <?php
                 }
                 ?>
                  <!-- <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr> -->
                </tbody>
              </table>
              <?php } ?>
            </div>
          </section>
        </div> 

                    <!-- AQUI SE MUESTRA LA TERCER TABLA (STATUS) -->
        <h3 align="center">Status</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Name</th>
                       
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //Asignamos a la vaariable listado el valor de la funcion read
                   $listado3=$usuario->leerStatus();
                  while($row=mysqli_fetch_object($listado3)){
                    //Creamos las variables y les asignamos el valor de la columna
                    $id=$row->id;
                    $Name=$row->Name;                                 
                    ?>
                    <!-- Imprimimos los valores de las variables dentro de la tabla                    -->
                    <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $Name?></td>
                 
                    <!-- <td><a href="./key.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td> -->
                  </tr>
                  <?php
                 }
                 ?>
                  <!-- <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr> -->
                </tbody>
              </table>
              <?php } ?>
            </div>
          </section>
        </div> 



        <!-- AQUI SE MUESTRA LA CUARTA TABLA (USER_TYPE) -->
        <h3 align=center>User_Type</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Name</th>
                       
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //Asignamos a la vaariable listado el valor de la funcion read
                   $listado4=$usuario->leerUser_type();
                  while($row=mysqli_fetch_object($listado4)){
                    //Creamos las variables y les asignamos el valor de la columna
                    $id=$row->id;
                    $Name=$row->Name;                                 
                    ?>
                    <!-- Imprimimos los valores de las variables dentro de la tabla                    -->
                    <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $Name?></td>
                 
                    <!-- <td><a href="./key.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td> -->
                  </tr>
                  <?php
                 }
                 ?>
                  <!-- <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr> -->
                </tbody>
              </table>
              <?php } ?>
            </div>
          </section>
        </div> 
      </div>
    </div>
    
    <?php require_once('footer.php'); ?>