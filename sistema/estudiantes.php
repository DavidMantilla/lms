<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	
	<meta name="author" content="David mantilla">
	
	<?php 
	error_reporting(0);
	
	include("../lib/personas.php");
	include("../lib/cursos.php");
	?>
	
	
	<link rel="icon" href="images/favicon.ico">
	
	<title>Curso</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    
    <?php 
session_start();
	
	
	
	if (!isset($_SESSION["perfil"]))
	{
		
		header("location:../index.php");
		
	}
	
	
	?>
    
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
				<h1 class="site-title "><b> <a href="index.html"><div style="background-color: white"><img src="../img/logo.png" width="100%" alt=""></div></a></b></h1>
				
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				
					<?php      if($_SESSION["perfil"]!=2){    ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link " href="Clases.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-book"></em> &nbsp;Clases <span class="sr-only"></span></a></li>
					<li class="nav-item"><a class="nav-link" href="biblioteca.php"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a class="nav-link" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
					
		
					
			</ul>
				<?php  }else{ ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link " href="Clases.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-book"></em> &nbsp;Clases <span class="sr-only"></span></a></li>
					<li class="nav-item"><a class="nav-link" href="biblioteca.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-list-alt"></em> Recursos</a></li>
					
					<li class="nav-item"><a href="estudiantes.php?materia=<?php echo $_GET['materia'];?>" class="nav-link" ><span class="fa fa-users"></span> &nbsp; Estudiantes </a></li>
				
		
				<li class="nav-item"><a class="nav-link" href="notas.php?materia=<?php echo $_GET['materia'];?>"><em class="fa fa-check-circle"></em> calificaciones</a></li>
				
					
					
			</ul>
			<?php }; ?>
				
				<a href="../lib/personas.php?btn=salir" class="logout-button"><em class="fa fa-power-off"></em> salir</a></nav>
			
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-md-left">Listado de estudiantes</h1>
					</div>
					
					<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
						
						<div class="username mt-1">
							<h4 class="mb-1"><?php

								$personas->usuario($_SESSION["user"]);?></h4>
							
							<h6 class="text-muted"><?php  $personas->perfil($_SESSION["perfil"]);  ?></h6>
						</div>
						</a>
						
						<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#"><em class="fa fa-user-circle mr-1"></em> ver perfil</a>
						     <a class="dropdown-item" href="#"><em class="fa fa-sliders mr-1"></em> ajustes</a>
						     <a class="dropdown-item" href="../lib/personas.php?btn=salir"><em class="fa fa-power-off mr-1"></em> Salir</a></div>
						     
					</div>
					<section align="left">
					<br><br>
					<div class="col-md-12" style="text-align:left"><?php $curso->listaEstudiantes($_GET["materia"]);  ?>
					<br>
					<a href="../lib/cursos.php?btn=lista&materia=<?php echo $_GET['materia'];?>" class="btn btn-primary" >Imprimir</a>
					</div>	
				</section>
			</main>
		</div>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
	    window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("3d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
	  </body>
</html>
