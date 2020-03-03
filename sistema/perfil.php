<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	
	<meta name="author" content="david mantilla">
	
	<?php 
	error_reporting(0);
	
		include("../lib/personas.php");
	include("../lib/cursos.php");
	include("../lib/notas.php");
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
				<b> <h1 class="site-title "><b> <a href="index.php"><div style="background-color: white"><img src="../img/logo.png" width="100%" alt=""></div></a></b></h1>

				<a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><em class="fa fa-bars"></em></a>
</b>
				
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
			<?php      if($_SESSION["perfil"]!=1){    ?>
			<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a>
					</li>


					<li class="nav-item"><a class="nav-link" href="Eventos.php"><em class="fa fa-bell"></em> Novedades <span class="badge badge-primary" style="font-size: 10px; font-weight:bold; 	;color:#00202A ; background-color:#fff !important;"><?php 
						$nota=new Notas();
	$nota->contarPendientes($_SESSION["user"]);?></span></a>
					</li>


				</ul>
				<?php  }else{ ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="widgets.html"><em class="fa fa-calendar-o"></em> Mis eventos</a></li>
					<li class="nav-item"><a class="nav-link" href="charts.html"><em class="fa fa-line-chart"></em> Estadisticas</a></li>
					
					
			</ul>
			<?php }; ?>
				
				
				<a href="../lib/personas.php?btn=salir" class="logout-button"><em class="fa fa-power-off"></em> Salir</a></nav>
			
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
				<header class="page-header row justify-center">
				
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-md-left">Bienvenido</h1>
					</div>
					<div class="col-md-6 col-lg-4">

						<div class="dropdown user-dropdown  text-center text-md-right pull-right">
						
							<a class="btn btn-stripped dropdown-toggle" href="" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div  >
						<img src="<?php  $personas->fotoPerfil($_SESSION["user"])?>" alt="foto Perfil" class="circle float-left profile-photo" width="50" height="auto">
						
						<div class="username mt-1">	
							<h4 class="mb-1"><?php 
								$personas->usuario($_SESSION["user"]);?></h4>
							
							<h6 class="text-muted"><?php $personas->perfil($_SESSION["perfil"]); ?></h6>
						</div></div>
						</a>
						

							<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="perfil.php"><em class="fa fa-user-circle mr-1"></em> Ver perfil</a>

								<a class="dropdown-item" href="../lib/personas.php?btn=salir"><em class="fa fa-power-off mr-1"></em> salir</a>
							</div>
							
							

						</div>
						<div class="dropdown user-dropdown  text-center  pull-right" style="padding: 30px">
<a id="dropdownMenuLink" class=" " data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
				<span class="fa fa-bell fa-1x" ></span> <span class="badge-primary badge"> 2<?php  ?></span></a>
					<ul class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem" aria-labelledby="not"> <?php $personas->notificaciones($_SESSION["user"]) ?>
							</ul></div>

					</div>
				</header>
					<section align="left">
					<br><br>
					<div class="container" style="">
					
					<div class="container" style="margin: 50px;">
<div class="row"> 
<div class="col-md-6"  > 
<div id="foto-perfil"><img src="<?php $personas->fotoPerfil($_SESSION['user']);
	?>" alt="foto Perfil" class="circle  profile-photo " width="300px" height="300px"  ></div>
							<button id="edit" type="button" class="btn btn-primary pull-right ">  Cambiar foto  &nbsp;<span class="fa fa-pencil "></span></a>
								
					</div>
					
					<?php  $personas->verperfil($_SESSION["user"]);?>
					<br><br>
					<a target="_blank" href="../lib/imprimir.php" class="btn btn-primary" >Imprimir</a>
					</div>	
				</section>
			</main>
		</div>
		
	</div> 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script > 
		$("#edit").click(function(){
    $("#foto-perfil").html("<form action='../lib/upload.php' method='post' enctype='multipart/form-data'><input type=file class='form-control' name='perfil' ><button class='btn btn-primary' name='submit'value='Upload Image' >enviar</button></form>");
});
		
		
	</script>
    <script src="dist/js/bootstrap.min.js"></script>
    
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
	
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"> </script>
    
	  </body>
</html>
