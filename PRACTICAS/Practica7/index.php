<?php
//SE LLAMA A LOS ENLACES DE LOS MODELOS
require_once "models/enlaces.php";
//SE LLAMA AL CRUD DE LOS MODELOS
require_once "models/crud.php";
//SE LLAMA AL CONTROLADOR
require_once "controllers/controller.php";


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script type="text/javascript">
		var hola;
				function agregarMateria(id){
					var idMateria = id;
					document.getElementById("auxiliar").value = idMateria;
					hola = idMateria;
					alert(hola);



				}
		</script>


     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php?action=grupos" ><i class="fas fa-layer-group "></i>GRUPOS <span class="badge"></span></a>
                    </li>

                    <li>
                        <a href="index.php?action=materias"><i class="fas fa-book "></i>MATERIAS  <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="index.php?action=usuarios"><i class="fas fa-user-friends "></i>ALUMNOS  <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="index.php?action=maestro"><i class="fas fa-user-friends "></i>MAESTROS  <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="index.php?action=tutorias"><i class="fas fa-user-friends "></i>TUTORIAS  <span class="badge"></span></a>
                    </li>
                </ul>
          </div>

        </nav>

    <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>GESTION DE LA UNIVERSIDAD</h2>
                    </div>
                </div>
                <hr />



            <div class="row-fluid col-lg-12" >
                <?php
                //OBJETO DE CONTROLADOR
                $mvc = new MvcController();
                //METODO DE PAGINA DEL CONTROLADOR QUE LLAMA AL TEMPLATE
                $mvc -> pagina();
                ?>
            </div>
              </div>
    </div>

  </div>

    <div class="footer">


            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
                </div>
            </div>
        </div>


     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
