<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Hotel MVC</title>

	<link rel="stylesheet" href="assets/styles/style.min.css">
	<link rel="stylesheet" href="assets/fonts/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
	<link rel="stylesheet" href="assets/plugin/percircle/css/percircle.css">
	<link rel="stylesheet" href="assets/plugin/chart/chartist/chartist.min.css">
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo"><i class="ico ti-home"></i>HOTEL</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">
																								<!-- Lista de funcionaldades del hotel -->
		<div class="navigation">
			<h5 class="title">Navegacion</h5>

			<ul class="menu js__accordion">
																									<!-- ENLACE PARA IR A LOS CLIENTES -->
				<li>
					<a class="waves-effect parent-item js__control" href="index.html"><i class="menu-icon ti-user"></i><span>Clientes</span></a>
				</li>
																						<!-- ENLACE PARA IR A LAS HABITACIONES -->
				<li>
					<a class="waves-effect parent-item js__control" href="calendar.html"><i class="menu-icon ti-home"></i><span>Habitaciones</span></a>
				</li>
																						<!-- ENLACE PARA IR A LAS RESERVACIONES -->
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon ti-id-badge"></i><span>Reservaciones</span><span class="menu-arrow fa fa-angle-down"></span></a>
							<ul class="sub-menu js__content">
								<li><a href="chart-3d.html">3D Charts</a></li>
							</ul>
				</li>
																								<!-- ENLACE PARA IR A LAS RESERVACIONES DE HABITACIONES -->
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon ti-calendar"></i><span>Reservacion de habitacion</span><span class="menu-arrow fa fa-angle-down"></span></a>
							<ul class="sub-menu js__content">
								<li><a href="chart-3d.html">3D Charts</a></li>
							</ul>
				</li>


			</ul>
			<!-- /.menu js__accordion -->
			<h5 class="title">User Interface</h5>
			<!-- /.title -->

	<!-- /.content -->
</div>
<!-- /.main-menu -->


																																											<!-- SE MUESTRA A PARTE SUPERIOR DEL ADMIN -->
<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Reserva con nosotros, es la mejor opción</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item ti-search js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="ti-search button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item ti-email notice-alarm js__toggle_open" data-target="#message-popup"></a>
		<a href="#" class="ico-item ti-bell notice-alarm js__toggle_open" data-target="#notification-popup"></a>
		<div class="ico-item">
			<i class="ti-user"></i>
			<ul class="sub-ico-item">
				<li><a href="#">Settings</a></li>
				<li><a class="js__logout" href="#">Log Out</a></li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->


<!-- /#notification-popup -->



																																									<!-- AQUI EMPIEZA EL CODIGO QUE ESTA EN EL ADMIN -->
<div id="wrapper">


</div>
																																									<!-- AQUI TERMINA EL CODIGO QUE ESTA EN EL ADMIN -->

																																										<!-- AQUI EMPIEZA EL FOOTER -->
		<footer class="footer">

		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->


	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Sparkline Chart -->
	<script src="assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/scripts/chart.sparkline.init.min.js"></script>

	<!-- Percent Circle -->
	<script src="assets/plugin/percircle/js/percircle.js"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartist Chart -->
	<script src="assets/plugin/chart/chartist/chartist.min.js"></script>
	<script src="assets/scripts/jquery.chartist.init.min.js"></script>

	<!-- FullCalendar -->
	<script src="assets/plugin/moment/moment.js"></script>
	<script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/scripts/fullcalendar.init.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>
