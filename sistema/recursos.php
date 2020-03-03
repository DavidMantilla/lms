<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	
	<meta name="author" content="david mantilla">
	
	
	
	
	<link rel="icon" href="images/favicon.ico">
	
	<title>SACE</title>

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
	
	error_reporting(0);
	if (!isset($_SESSION["perfil"]))
	{
		header("location:../index.php");
		
	}
	

	include("../lib/personas.php");
	
	
	
	?>
    
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
				<h1 class="site-title "><b> <a href="index.html">Sistema de administración de cursos y eventos</a></b></h1>
				
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				
				
				<?php      if($_SESSION["perfil"]!=1){    ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.html"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="widgets.html"><em class="fa fa-book"></em> Clases</a></li>
					<li class="nav-item"><a class="nav-link" href="charts.html"><em class="fa fa-list-alt"></em> Biblioteca</a></li>
					<li class="nav-item"><a class="nav-link" href="elements.html"><em class="fa fa-calendar-o"></em> Eventos</a></li>
		
					
			</ul>
				<?php  }else{ ?>
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.html"><em class="fa fa-home"></em>Inicio <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="widgets.html"><em class="fa fa-calendar-o"></em> Mis eventos</a></li>
					<li class="nav-item"><a class="nav-link" href="charts.html"><em class="fa fa-line-chart"></em> Estadisticas</a></li>
					
					
			</ul>
			<?php }; ?>
				
				
				
				<a href="../lib/personas.php?btn=salir" class="logout-button"><em class="fa fa-power-off"></em> Signout</a></nav>
			
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-md-left">Bienvenido</h1>
					</div>
					
					<div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="images/profile-pic.jpg" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
						
						<div class="username mt-1">
							<h4 class="mb-1"><?php 
								$personas->usuario($_SESSION["user"]);?></h4>
							
							<h6 class="text-muted"><?php $personas->perfil($_SESSION["perfil"]); ?></h6>
						</div>
						</a>
						
						<div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="perfil.php"><em class="fa fa-user-circle mr-1"></em> View Profile</a>
						    
						     <a class="dropdown-item" href="../lib/personas.php?btn=salir"><em class="fa fa-power-off mr-1"></em> salir</a></div>
						     
					</div>
						
							
											<div class="clear"></div>
				</header>
				
				<section class="row">
					<div class="col-sm-12">
						<section class="row">
							
							<?php  if($_SESSION["perfil"]!=1){    ?>
							<div class="col-sm-12 col-md-6 col-lg-5">
						
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Mis Cursos</h3>
										
										<div class="dropdown card-title-btn-container">
											<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
											
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
												<a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
												<a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
										</div>
										
										<h6 class="card-subtitle mb-2 text-muted">A simple checklist</h6>
										
										<ul class="todo-list mt-2">
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-1" />
													
													<label for="checkbox-1">Make coffee</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-2" />
													
													<label for="checkbox-2">Check emails</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-3" />
													
													<label for="checkbox-3">Reply to Jane</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-4" />
													
													<label for="checkbox-4">Work on the new design</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-5" />
													
													<label for="checkbox-5">Get feedback</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
										</ul>
										
										<div class="card-footer todo-list-footer">
											
										</div>
									</div>
								</div>
								
							</div>
							<?php } else{ ?>
							<div class="col-sm-12 col-md-4 col-lg-4">
						
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Mis Eventos</h3>
										
										<div class="dropdown card-title-btn-container">
											<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
											
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
												<a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
												<a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
										</div>
										
										<h6 class="card-subtitle mb-2 text-muted">A simple checklist</h6>
										
										<ul class="todo-list mt-2">
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-1" />
													
													<label for="checkbox-1">Make coffee</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-2" />
													
													<label for="checkbox-2">Check emails</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-3" />
													
													<label for="checkbox-3">Reply to Jane</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-4" />
													
													<label for="checkbox-4">Work on the new design</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
											<li class="todo-list-item">
												<div class="form-check">
													<input type="checkbox" id="checkbox-5" />
													
													<label for="checkbox-5">Get feedback</label>
													
													<div class="float-right action-buttons"><a href="#" class="trash"><em class="fa fa-trash"></em></a></div>
												</div>
											</li>
										</ul>
										
										<div class="card-footer todo-list-footer">
											
										</div>
									</div>
								</div>
								
							</div>
							
							<?php }?>
								<div class="col-sm-12 col-md-6 col-lg-5">
								<div class="card mb-4">
									<div class="card-block">
										<h3 class="card-title">Calendario</h3>
										
										<div class="dropdown card-title-btn-container">
											<button class="btn btn-sm btn-subtle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><em class="fa fa-cog"></em></button>
											
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#"><em class="fa fa-search mr-1"></em> More info</a>
												<a class="dropdown-item" href="#"><em class="fa fa-thumb-tack mr-1"></em> Pin Window</a>
												<a class="dropdown-item" href="#"><em class="fa fa-remove mr-1"></em> Close Window</a></div>
										</div>
										
										<h6 class="card-subtitle mb-2 text-muted">What's coming up</h6>
										
										<div id="calendar"></div>
									</div>
								</div>
							
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
