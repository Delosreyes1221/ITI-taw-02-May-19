<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home - SpaceX Template</title>

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
		<a href="index.html" class="logo"><i class="ico ti-rocket"></i>SpaceX</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Navegacion</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect" href="index.html"><i class="menu-icon ti-dashboard"></i><span>Dashboard</span></a>
				</li>
				<li>
					<a class="waves-effect" href="calendar.html"><i class="menu-icon ti-calendar"></i><span>Calendar</span></a>
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon ti-bar-chart"></i><span>Charts</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">3D Charts</a></li>
						<li><a href="chart-chartist.html">Chartist Charts</a></li>
						<li><a href="chart-chartjs.html">Chartjs Chart</a></li>
						<li><a href="chart-dynamic.html">Dynamic Chart</a></li>
						<li><a href="chart-flot.html">Flot Chart</a></li>
						<li><a href="chart-knob.html">Knob Chart</a></li>
						<li><a href="chart-morris.html">Morris Chart</a></li>
						<li><a href="chart-sparkline.html">Sparkline Chart</a></li>
						<li><a href="chart-other.html">Other Chart</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect" href="widgets.html"><i class="menu-icon ti-layers-alt"></i><span>Widgets</span><span class="notice notice-yellow">6</span></a>
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
		<h1 class="page-title">Home</h1>
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


		<footer class="footer">
			<ul class="list-inline">
				<li>2016 © NinjaAdmin.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
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
