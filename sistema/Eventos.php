<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="">

	<meta name="author" content="david mantilla">



	<link rel="icon" href="images/favicon.ico">

	<title>SACE</title>

	<!-- Bootstrap core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">

	<!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Icons -->
	<link href="css/font-awesome.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet">

	<?php 
session_start();
	
	error_reporting(0);
	if (!isset($_SESSION["perfil"]))
	{
		header("location:../index.php");
		
	}
	

	include("../lib/personas.php");
	include("../lib/cursos.php");
	include("../lib/notas.php");
	include("../lib/eventos.php");
	
	?>

</head>

<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
				<h1 class="site-title "><b> <a href="index.php"><div style="background-color: white"><img src="../img/logo.png" width="100%" alt=""></div></a></b></h1>

				<a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><em class="fa fa-bars"></em></a>


				<?php      if($_SESSION["perfil"]!=1){    ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a>
					</li>


					<li class="nav-item"><a class="nav-link" href="Eventos.php"><em class="fa fa-bell"></em> Novedades <span class="badge badge-primary" style="font-size: 10px; font-weight:bold; 	;color:#00202A ; background-color:#fff !important;"><?php 
						echo($eventos->contarEventos());?></span></a>
					</li>


				</ul>
				<?php  }else{ ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link " href="index.php"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item"><a class="nav-link active" href="eventos.php"><em class="fa fa-calendar-o"></em> Mis eventos</a>
					</li>					
					
					
					
					<?php 
							 if($_GET["id"]){ ?>
					<li class="nav-item"><a class="nav-link" href="charts.html"><em class="fa fa-line-chart"></em> Estadisticas</a>
					</li>

                   <?php } ?>
				</ul>
				<?php }; ?>



				<a href="../lib/personas.php?btn=salir" class="logout-button"><em class="fa fa-power-off"></em> Salir</a>
			</nav>

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

					<ul class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem" aria-labelledby="not"> <?php $personas->notificaciones($_SESSION["user"]) ?>
							</ul>
							<a id="dropdownMenuLink" class=" " data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
				<span class="fa fa-bell fa-1x" ></span> <span class="badge-primary badge"> <?php echo($personas->noti);  ?></span></a></div>

					</div>
				</header>

			  <section class="row">
					
						<?php if(!$_GET["id"]){?>
<div class="col-sm-12 col-md-5 col-lg-5">
													

								<div class="card mb-4 ">
								<div class="card-header card-inverse card-primary"><h3 class="card-title "><span class="fa fa-user text-danger"></span> Mis Eventos</h3>
<h6 class="card-subtitle mb-2 text-muted">Estos son tus Eventos</h6>
									</div>
								<div class="card-block">
									
									

										

										

									<?php
							if($_SESSION["perfil"]>1){ 
								
								
								
								$eventos->listaEventostodos();
								
							 }
									
									else{
										
										$eventos->listaEventos($_SESSION["user"]);
										
										
									}
									
									?>	
									</div>
								</div>

							</div>
							
							
						
							
				<?php	if($_SESSION["perfil"]==1){ ?>
				<div class="col-sm-12 col-md-5 col-lg-5">
													

								<div class="card mb-4 ">
								<div class="card-header card-inverse card-primary">	<h3 class="card-title"><span class="fa fa-list-alt text-info"></span> Eventos</h3>
<h6 class="card-subtitle mb-2 text-muted">todos los Eventos</h6>
									</div>
								<div class="card-block">
									
								

										

										

									<?php $eventos->listatodos($_SESSION["user"]);?>
									</div>
								</div>

							</div>
					
					<div class="col-sm-12 col-md-10 col-lg-10">
													

								<div class="card mb-4 card-inverse card-primary">
								<div class="card-block">
									
									<h3 class="card-title"><span class="fa fa-plus-circle text-warning"></span> Nuevo Evento</h3>
									<h6 class="card-subtitle mb-2 text-muted">desde aqui puedes crear tu evento</h6>
									<form id="form" class="form-group" style="padding: 20px;" onSubmit="agregar(event)">
									<label for="" class="form-label">Nombre: </label>
									<input type="text" id="name"  name="name" class="form-control">
									<label for=""  class="form-label">Fecha: </label>
									<input type="date" name="fecha" id=fecha class="form-control">
									<label for="" class="form-label">Imagen</label>
									<input type="file" name="imagen" id="imagen" class="form-control-file">
									<label for="" class="form-label">Descripción:</label>
									<textarea name="desc" id="desc" id="" cols="30" rows="10" class="form-control"></textarea>
									
										
										<br>
										
										<button type="submit" class="btn btn-warning" style="color:black" name="btn" value="1"><b>Crear</b></button>	
										
										
									</form>
										

										
									</div>
							</div></div>
			<?php	} }
				  else {?>	
				  <div class="col-md-10">
				  	<div class="card mb-4">
				  		<div class="card-block">
				  			
				  			
				  			<?php $eventos->verEvento($_GET["id"]);?>
				  		</div>
				  	</div>	
				  			</div>	
			  								
			  								
			  								
			  								
			  								
				  								
					<?php	}?>
						</div>

	
							

					  </section>
						<section class="row">

						</section>
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
		<script src="js/bootstrap-datepicker.es.min.js" charset="UTF-8" ></script>
	<script src="js/bootstrap-datepicker.js" charset="UTF-8" ></script>
	<script src="js/custom.js"></script>

	<script>
		
		function agregar(e){
			
			e.preventDefault();
	 var f=$(this);
	var datos = new FormData(document.forms.namedItem("form"));
			datos.append("user","<?php echo($_SESSION["user"]) ?> ");
	datos.append("btn","1");
	 $.ajax({
                url: "../lib/eventos.php",
                type: "post",
                dataType: "html",
                data: datos,
                cache: false,
                contentType: false,
	     processData: false
            })
                .done(function(res){
		 
                 console.log("respuesta: "+res);
			window.location.reload();
			
	 });
			
		}
		
		
		
		
		
		
	</script>
	

</body>

</html>