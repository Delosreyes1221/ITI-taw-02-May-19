
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form action="" class="frm-single" method="POST">
		<div class="inside">
			<div class="title"><strong>Inicio</strong>Sesion</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input name ="usuario" type="text" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input name="contra" type="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<div class="pull-left">
					<div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Remember me</label></div>
					<!-- /.checkbox -->
				</div>
				<!-- /.pull-left -->
				<div class="pull-right"><a href="page-recoverpw.html" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
				<!-- /.pull-right -->
			</div>
			<!-- /.clearfix -->
			<input type="submit" name="enviar" value="Ingresar" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i>>
			<div class="row small-spacing">
				<div class="col-sm-12">
					<div class="txt-login-with txt-center">or login with</div>
					<!-- /.txt-login-with -->
				</div>
				<!-- /.col-sm-12 -->
				<div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
				<!-- /.col-sm-6 -->
				<div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
				<!-- /.col-sm-6 -->
			</div>
			<!-- /.row -->
			<a href="page-register.html" class="a-link"><i class="fa fa-key"></i>New to NinjaAdmin? Register.</a>
			<div class="frm-footer">NinjaAdmin © 2016.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>

	<?php
	//Incluimos el archvo database
    include 'database.php';

	//Preguntamos si existe el valor enviar	
    if(isset($_POST['enviar'])){
		
		//Creamos la variable usuario y le asignamos el valor de la caja de texto
		$usuario = $_POST['usuario'];
		//Creamos la variable contra y le asignamos el valor de la caja de texto
        $contra = $_POST['contra'];
    
	//cremaos un objeto de la clase database
	$clientes= new Database();
	
	//Le asignamos el valor de la funcion read a la varable listado
    $listado = $clientes->read();

	//Usamos el while para verificar que existan los datos ingresados en las cajas de texto
    while ($row = mysqli_fetch_object($listado)){
		 $usuarioDb = $row->nombres;
		 $contraDb = $row->contra;

		 if($usuario == $usuarioDb && $contra == $contraDb)
		 {
			 header("Location: inicio.php");
			 session_start();
			 $_SESSION['id'] = $row->id;
			
		 }

	}

}
    
?>

	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>